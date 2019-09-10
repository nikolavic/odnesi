<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 7/30/2019
 * Time: 9:07 PM
 */

namespace App\Core;


use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;
use ICanBoogie\Inflector;

class Model extends QueryBuilder
{
    public $table;

    public function __construct()
    {
        $pdo = Connection::make(App::get('config')['database']);
        parent::__construct($pdo);
        $inflector = Inflector::get('en');
        $this->table = $inflector->pluralize($this->get_class_name());
    }

    /**
     * @return string
     *
     */
    public function get_class_name()
    {
        $path = explode('\\', get_called_class());
        return strtolower(array_pop($path));
    }

    /**
     * @param $class
     * @param bool $is_to_lower
     * @return mixed|string
     *
     */
    public function get_table_for_relation($class, $is_to_lower = false)
    {
        $path = explode('\\', $class);
        if (!$is_to_lower) {
            return strtolower(array_pop($path));
        }
        return array_pop($path);
    }

    public function has_many($class)//jedan na vise
    {
        $inflector = Inflector::get('en');
        $this->table = $inflector->pluralize($this->get_table_for_relation($class));
        $parameters = [
            $this->get_class_name() . "_id" => $this->id,
        ];
        return $this->where($parameters);

    }

    public function belongsTo($class) //one to one naopacke
    {
        $obj=new $class;
        $class_name = $class;
        $selector = $this->get_table_for_relation($class_name) . "_id";
        return $obj->find($this->$selector);
    }

    public function make_pivot($class)
    {
        $inflector = Inflector::get('en');
        $plural_class = $inflector->pluralize($class);
        $pivot_second = $this->get_table_for_relation($plural_class);
        return $this->get_table_for_relation(get_called_class(), true) . "_" . $pivot_second;

    }

    public function belongsToMany($class) //many to many
    {
        $pivot = $this->make_pivot($class);
        $parameters = [
            $this->get_class_name() . "_id" => $this->id
        ];
        $result_from_pivot = $this->where($parameters, $pivot);
        $class_name = $class;
        $class = new $class;
        $selector = $this->get_table_for_relation($class_name) . "_id";
        $collection=[];
        foreach ($result_from_pivot as $pivot) {
            $collection[] = $class->where([
                "id" => $pivot->$selector
            ]);
        }
        return $collection;

    }


}