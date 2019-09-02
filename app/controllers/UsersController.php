<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;
use Rakit\Validation\Validator;
use App\Classes\Session;
use App\Models\User;
class UsersController extends Controller
{
    /**
     * Show all users.
     */
    public function index()
    {
        $users = $this->user->users->selectAll();

        return view('users', compact('users'));
    }

    public function signup()
    {

        return view('register');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        $validator = new Validator;
        $validator = $validator->validate($_POST, [
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'email' => 'required|min:8|max:50|email',
            'address' => 'required|min:8|max:50',
            'confirm_password' => 'required|same:password',
            'password' => 'required|min:8|max:50',
        ]);

        if ($validator->fails()) {
            // handling errors
            $errors = $validator->errors();
            Session::set_session('errors', $errors->toArray());
            return redirect('signup');
        }

        $parameters = [
            'name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => crypt($_POST['password'], 'sha256'),
            'address' => $_POST['address'],
            'phone' => $_POST['contact_no'],


        ];
        $users = new User();
        $user = $users->insert($parameters);
        $_SESSION['user_id'] = $users->get_last_inserted();

        Session::set_session('success', 'Uspesno ste se registrovali');
        return redirect('');

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        return redirect('');
    }

    public function login()
    {
        return view('login');
    }

    public function executeLogin(){
        $parameters= [
            'email'=>$_POST['email'],
            'password'=>crypt($_POST['password'],'sha256')
        ];
        $users=new User();
        $user=$users->where($parameters);
        if(count($user)){
            $_SESSION['user_id']=$user[0]->id;
            redirect('');
        }
    }
}
