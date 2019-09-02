<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\Addition;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_addition;
use App\Models\Product_Category;
use App\Models\Product_image;
use App\Models\User;
use Rakit\Validation\Validator;
use App\Classes\Session;
use Intervention\Image\ImageManager;

class AdminController
{
    public function __construct()
    {
        if(auth()->user()->role != 1){
            return redirect('');
        }

    }

    public function index()
    {
       $products=new Product();
       $products=$products->selectAll();
       $num_products=count($products);
       $cat=new Product_Category();
       $num_cat=count($cat->selectAll());
       $user=new User();
       $orders=new Order();
       $num_orders=count($orders->where(['accepted'=>0]));
       $num_user=count($user->selectAll());
        return view('admin',compact('num_products','num_cat','num_user','num_orders'));
    }

    public function products()
    {
        $products=new Product();
        $products=$products->selectAll();
        return view('products',compact('products'));
    }

    public function add_products()
    {
       $category=new Product_Category();
       $addition=new Addition();
       $additions=$addition->selectAll();
       $categories=$category->selectAll();
        return view('add-product',compact('categories','additions'));
    }

    public function store_products()
    {
        $validator=new Validator();
        $validator= $validator->validate($_POST + $_FILES,[
            'name'=>'required|min:8|max:50',
            'decleration'=>'required|min:20',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'taste'=>'required',
            'images*'=>'required'
            ]);
        $validator->validate();

        if(count($_FILES['images']['name']) < 7){
            $img_error="You must upload minimum 7 photo";
        }

        if ($validator->fails()) {
            // handling errors
            $errors = $validator->errors()->toArray();
            if(isset($img_error)){

                $errors['image']['min_image']='Morate uneti najmanje 7 slika';
            }

            Session::set_session('errors',$errors);
            return redirect('add_product');
        }

        $product= new Product();

        $product->insert([
            'name'=>$_POST['name'],
            'category_id'=>$_POST['category_id'],
            'declaration'=>$_POST['decleration'],
            'price'=>$_POST['price'],
            'user_id'=>auth()->user()->id,
            'taste'=>$_POST['taste']
        ]);

        $product_addition= new Product_addition();
        foreach ($_POST['additions'] as $addition){
            $param=[
                'product_id'=>$product->get_last_inserted(),
                'addition_id'=>$addition
            ];
            $product_addition->insert($param);
        }

        $img=new ImageManager();
        $product_image=new Product_image();
        for($i=0;$i<count($_FILES['images']['name']);$i++){
            $image = $img->make($_FILES['images']['tmp_name'][$i]);
            $path = 'public/images/products';
            $img_name = time() . '_' . $_FILES['images']['name'][$i];
            $image->save($path . '/' . $img_name);
            $full_link=$path.'/'.$img_name;
            $product_image->insert([
                'link'=>$full_link,
                'product_id'=>$product->get_last_inserted()
            ]);
        }


    }

    public function update_products()
    {
        $validator=new Validator();
        $validator= $validator->validate($_POST + $_FILES,[
            'name'=>'required|min:8|max:50',
            'decleration'=>'required|min:20',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'taste'=>'required',
        ]);
        $validator->validate();

        $product= new Product();
        $product=$product->find($_GET['product_id']);
        $product->update([
            'name'=>$_POST['name'],
            'category_id'=>$_POST['category_id'],
            'declaration'=>$_POST['decleration'],
            'price'=>$_POST['price'],
            'user_id'=>auth()->user()->id,
            'taste'=>$_POST['taste']
        ]);
        Session::set_session('success','Uspesno ste izmenili proizvod');
        return redirect('products');


    }

    public function store_additions()
    {
        $addition=new Addition();
        $addition->insert([
            'name'=>$_POST['name'],
            'type'=>$_POST['taste']
        ]);
        redirect('products');

    }

    public function edit()
    {
        $category=new Product_Category();
        $addition=new Addition();
        $products=new Product();
        $product=$products->find($_GET['product_id']);
        $additions=$addition->selectAll();
        $categories=$category->selectAll();

        return view('edit-product',compact('additions','categories','product'));
    }

    public function delete_product()
    {
        $product=new Product();
        $product=$product->find($_GET['product_id']);
        $product->delete();
        return redirect('products');

    }

    public function category()
    {
        $categories=new Product_Category();
        $categories=$categories->selectAll();

        return view('category',compact('categories'));
    }

    public function update_category()
    {
        $cat=new Product_Category();
        $cat=$cat->find($_GET['cat']);
        $cat->update([
            'name'=>$_GET['val']
        ]);

    }

    public function add_category()
    {
        $cat=new Product_Category();
        $cat->insert([
          'name'=>$_POST['name']
        ]);

        return redirect('category');

    }

}