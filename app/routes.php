 <?php

$router->get('', 'PagesController@home');
$router->get('contact', 'PagesController@contact');

 $router->get('users', 'UsersController@index');
 $router->post('users', 'UsersController@store');
 $router->get('signup', 'UsersController@signup');
 $router->post('register-store', 'UsersController@store');
 $router->get('logout', 'UsersController@logout');
 $router->get('admin', 'AdminController@index');
 $router->get('login', 'UsersController@login');
 $router->post('login','UsersController@executeLogin');
 $router->get('client-order', 'PagesController@client_orders');
 $router->get('add-comment','PagesController@add_comment');
 $router->post('post_comment','PagesController@post_comment');

 //products

 $router->get('products', 'AdminController@products');
 $router->get('add_product', 'AdminController@add_products');
 $router->post('store_products', 'AdminController@store_products');
 $router->post('store_additions', 'AdminController@store_additions');
 $router->post('update_products', 'AdminController@update_products');
 $router->get('delete-product','AdminController@delete_product');
 $router->get('delete-product','AdminController@delete_product');
 $router->get('category','AdminController@category');
 $router->get('update_category','AdminController@update_category');
 $router->post('store_category','AdminController@add_category');

 //shop

 $router->get('shop', 'ShopController@index');
 $router->get('single-product','ShopController@show');
 $router->post('add_to_cart','ShopController@store');
 $router->get('cart','ShopController@cart');
 $router->get('checkout','ShopController@checkout');
 $router->post('store_checkout','ShopController@storeOrder');
 $router->get('orders','ShopController@orders');
 $router->get('order-change-status','ShopController@updateStatus');
 $router->get('edit-product','AdminController@edit');

