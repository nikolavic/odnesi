<?php
namespace App\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_Category;
use App\Classes\Session;
use Rakit\Validation\Validator;

class ShopController
{
    public function index()
    {
        $product=new \App\Models\Product();
        $products=$product->selectAll();
        return view('shop',compact('products'));
    }

    public function show()
    {
        $product_id=$_GET['product_id'];
        $products= new Product();
        $product=$products->find($product_id);
        $categories= new Product_Category();
        $category=$categories->find($product->category_id);
        return view('single-product',compact('product','category'));
    }

    public function store()
    {
        $validator= new Validator();
        $validator= $validator ->validate($_POST,[
            'qty'=>'required|numeric',
            'price'=>'required|numeric'
        ]);

        if ($validator->fails()) {
            // handling errors
            $errors = $validator->errors()->toArray();
            Session::set_session('errors',$errors);
            return redirect('products');
        }
        $cart=new Cart();
        $products=new Product();
        $price=$products->find($_GET['product_id'])->price * $_POST['qty'];
        $additions=json_encode($_POST['addition']);
        $cart->insert([
            'user_id'=>auth()->user()->id,
            'product_id'=>$_GET['product_id'],
            'qty'=>$_POST['qty'],
            'price'=>$price,
            'additions'=>$additions
        ]);
        Session::set_session('success','Uspesno ste dodali u korpu');
        redirect('cart');

    }

    public function cart()
    {
        $user_cart=auth()->user()->has_many(Cart::class);
        $sum=array_sum(array_map(function($item) {
            return $item->price;
        }, $user_cart));
        return view('cart',compact('user_cart','sum'));
    }

    public function checkout()
    {
        $user_cart=auth()->user()->has_many(Cart::class);
        $sum=array_sum(array_map(function($item) {
            return $item->price;
        }, $user_cart));

        return view('checkout',compact('user_cart','sum'));
    }

    public function storeOrder()
    {

        $validator= new Validator();
        $validator= $validator ->validate($_POST,[
            'address'=>'required',
            'phone'=>'required',
           //dodati validaciju za vreme
        ]);

        if ($validator->fails()) {
            // handling errors
            $errors = $validator->errors()->toArray();
            Session::set_session('errors',$errors);
            return redirect('products');
        }
        $cart=new Cart();
        $carts=$cart->whereIn(['id',[$_POST['products']]]);
        $sum=array_sum(array_map(function($item) {
            return $item->price;
        }, $carts));

        $params=[
            'user_id'=>auth()->user()->id,
            'address'=>$_POST['address'],
            'phone'=>$_POST['phone'],
            'cart_info'=>json_encode($carts),
            'total_price'=>$sum,
            'payment_info'=>$_POST['payment-value'],
            'last_time_to_arrive'=>$_POST['last_time_to_arrive'],
            'info'=>$_POST['info']
        ];
        $order=new Order();
        $order->insert($params);
        foreach($carts as $cart){
            $cart->delete();
        }
        redirect('shop');


    }

    public function orders()
    {
        $order=new Order();
        $new_order=$order->where(['accepted'=>0,'finished'=>0]);
        $accepted=$order->where(['accepted'=>1,'finished'=>0]);
        $finished=$order->where(['accepted'=>1,'finished'=>1]);

        return view('orders',compact('new_order','accepted','finished'));
    }

    public function updateStatus()
    {
        if(isset($_GET['accepted'])){
        $order=new Order();
        $order=$order->find($_GET['order_id']);
        $order->update(['accepted'=>1]);
        return redirect('orders');
        }

        if(isset($_GET['finished'])){
            $order=new Order();
            $order=$order->find($_GET['order_id']);
            $order->update(['finished'=>1]);
            return redirect('orders');
        }

    }

}


?>