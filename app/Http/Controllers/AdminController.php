<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'category' => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                'status' =>400,
                'errors' =>$validator->messages(),
            ]);
        }else{
            $category = new Catproduct();
            $category->category = $request->input('category');
            $category->save();
            return response()->json([
                'status' =>200,
                'message' =>'Category added successfully',
            ]);
        }
    }

    public function fetchCategory(){
        $category = Catproduct::all();
        return response()->json([
            'category'=>$category,
        ]);
    }

    public function edit($id)
    {
        $category = Catproduct::find($id);
        if($category)
        {
            return response()->json([
                'status'=>200,
                'category'=> $category,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No category Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category'=> 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $category = Catproduct::find($id);
            if($category)
            {
                $category->category = $request->input('category');
                $category->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Category Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Category Found.'
                ]);
            }

        }
    }


    public function destroy($id)
    {
        $category = Catproduct::find($id);
        if($category)
        {
            $category->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Category Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No category Found.'
            ]);
        }
    }
}
