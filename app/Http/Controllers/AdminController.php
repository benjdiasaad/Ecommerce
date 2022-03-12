<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function category() {
       return view('admin.category');
    }

    public function product(){
        return view('admin.product');
    }

    public function login(){
        return view('admin.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => [
                'required',
            ],
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }
  
        return redirect("/admin/register");
    }

    public function register(){
        return view('admin.register');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }  

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/admin/dashboard");
    }

    public function checkAuth(){
        if(auth()->check()){
            return redirect("/admin/dashboard");
        }else{
            return redirect("/admin/register");
        }
    }
}
