<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    public $table;
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll()
    {
        $statement = $this->pdo->prepare("select * from {$this->table}");

        $statement->execute();
        return $this->bind_class_to_collection(get_called_class(),$statement->fetchAll(PDO::FETCH_CLASS));
    }

    public function randItem($num){
        $statement = $this->pdo->prepare("select * from {$this->table} ORDER BY RAND() LIMIT {$num}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function find($id)
    {
        $statement = $this->pdo->prepare("select * from {$this->table} WHERE id='$id'");

        $statement->execute();
        return $this->bind_class_to_collection(get_called_class(),$statement->fetchObject());
    }

    public function bind_class_to_collection($class,$collection)
    {
        $new_collection=[];
        if(is_array($collection)){
       foreach ($collection as $collect){
        $obj=new $class();
        foreach ($collect as $key => $cur){
            $obj->$key=$cur;
        }
        $new_collection[]=$obj;
    }
            return $new_collection;

        }else{
            $obj=new $class();
            foreach ($collection as $key => $cur){
                $obj->$key=$cur;
            }
            return $obj;
        }

    }
    public function where($parameters,$table=false,$called_class=false){
        $wheres='';
        if($table){
           $this->table=$table;
        }
        foreach($parameters as $key=>$value){
            if($wheres != ''){
                $wheres.=" AND";
            }
            $wheres.=' '.$key.'='."'$value'";
        }
        $sql="SELECT * from {$this->table} WHERE {$wheres}";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
            return $this->bind_class_to_collection($this->get_called_class_uf($called_class),$statement->fetchAll(PDO::FETCH_CLASS));
        } catch (\Exception $e) {
            dd($e);
        }
    }

   public function get_called_class_uf($class=false){
        if($class){
            return $class;
        }
        return get_called_class();
    }




    public function whereIn($params,$table=false)
    {
        $column=$params[0];

        $wheres='';
        foreach($params[1][0] as $key=>$value){
            if($wheres != ''){
                $wheres.=" OR";
            }
            $wheres.=' '.$column.'='."'$value'";
        }

        $sql="SELECT * from {$this->table} WHERE {$wheres}";
        $statement=$this->pdo->prepare($sql);
        $statement->execute();
        return $this->bind_class_to_collection(get_called_class(),$statement->fetchAll(PDO::FETCH_CLASS));
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $this->table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update($parameters)
    {
        $update='SET';
        foreach($parameters as $key=>$value){
            $update.=' '.$key.'='."'$value',";
        }

        $update=substr_replace($update ,"", -1);


        $sql="UPDATE {$this->table} {$update} where id='$this->id'";
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function delete()
    {
        $sql="DELETE from {$this->table} where id='$this->id'";
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (\Exception $e) {
            dd($e);
        }

    }

    public function get_last_inserted()
    {
        return $this->pdo->lastInsertId();

    }
}
