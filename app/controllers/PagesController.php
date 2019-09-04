<?php

namespace App\Controllers;
use App\Core\App;
use App\Controllers\Auth;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_Category;

class PagesController
{
    /**
     * Show the home page.
     */

    public function __construct()
    {
        $this->product_category=new Product_Category();
        $this->product=new Product();
    }

    public function home()
    {
        $category = $this->product_category->randItem(4);
        $products = $this->product->randItem(4);

        return view('index',compact('category','products'));
    }

    public function client_orders()
    {
        $order=new Order();
        $new_order=$order->where(['accepted'=>0,'finished'=>0,'user_id'=>\auth()->user()->id]);
        $accepted=$order->where(['accepted'=>1,'finished'=>0,'user_id'=>\auth()->user()->id]);
        $finished=$order->where(['accepted'=>1,'finished'=>1,'user_id'=>\auth()->user()->id]);

        return view('client-orders',compact('new_order','accepted','finished'));
    }

    public function post_comment()
    {
        $params=[
          'user_id'=>auth()->user()->id,
            'order_id'=>$_GET['order'],
            'text'=>$_POST['text'],
            'rating'=>$_POST['rating']
        ];
        $comments=new Comment();
        $comments->insert($params);
        return redirect('client-order');


    }

    public function add_comment()
    {

        return view('add_comment');
    }

    /**
     * Show the about page.
     */

    /**
     * Show the contact page.
     */
    public function contact()
    {
        return view('contact');
    }
}
