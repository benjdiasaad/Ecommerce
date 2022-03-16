<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Catproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /* Pass number of (users, products, categories) in dashboard*/
    public function index() {
        $product = Product::count();
        $category = Catproduct::count();
        $user = User::count();
        $message = Contact::count();
        return view('admin.dashboard',['product' => $product, 'category'=>$category,'user'=>$user,'message'=>$message]);
    }

    public function message(){
        $messages = Contact::all();
        return view('admin.message',['messages' => $messages]);
    }

    /* return view category */
    public function category() {
       return view('admin.category');
    }

    /* return view login */
    public function login(){
        return view('admin.login');
    }


    /* verify if user is logged in */
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
  
        return redirect("/admin/login");
    }

    /* return view registration */
    public function register(){
        return view('admin.register');
    }

    /* create a new user */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }  

    /* verify if user is already registered */
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

    /* check user authentication */
    public function checkAuth(){
        if(auth()->check()){
            return redirect("/admin/dashboard");
        }else{
            return redirect("/admin/login");
        }
    }

    /* add new category */
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

    /* return list of all categories */
    public function fetchCategory(){
        $category = Catproduct::all();
        return response()->json([
            'category'=>$category,
        ]);
    }

    /* return list of categories using for select a product*/
    public function product(){
        $categories = Catproduct::all();

        return view('admin.product', ['categories' => $categories]);
    }

    /* return list of products */
    public function fetchProduct(){
        $product = Product::join('catproducts', 'products.category_id', '=', 'catproducts.id')
                ->select('nom','details','prix','image','category','products.id')
                ->orderBy('products.id')
                ->get();
        // $product = Product::join();
        return response()->json([
            'product'=>$product,
        ]);
    }

    /* if i clic in button edit category display data in form */
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

    public function editProduct($id)
    {
        $products = Product::find($id);
        $product = Product::join('catproducts', 'products.category_id', '=', 'catproducts.id')
                            ->select('nom','details','prix','image','category','category_id')
                            ->where('catproducts.id', $products->category_id)
                            ->where('products.id', $id)
                            ->get();

        if($product)
        {
            return response()->json([
                'status'=>200,
                'product'=> $product,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No product Found.'
            ]);
        }

    }

    // public function updateProduct(Request $request){
    //     $product_id = $request->product_id;
    //     $product = Product::find($product_id);

    //     $path = "files/";
    //     $validator = \Validator::make($request->all(),[
    //         'nom'=>'required',
    //      ]);
    //     if(!$validator->passes){
    //         return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
    //     }else{

    //     }
    // }

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

    public function getMessage($id){
        $message = Contact::find($id);
        if($message)
        {
            return response()->json([
                'status'=>200,
                'message'=> $message,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No message Found.'
            ]);
        }
    }

    /* delete a specefic category */
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

    /* delete a specific product */
    public function destroyProduct($id){
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Product Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No product Found.'
            ]);
        }
    }


    /* Add new product and store image in public/storage/files */
    public function storeProduct(Request $request){
        $validator = \Validator::make($request->all(),[
            'nom'=>'required|string|unique:products',
            'details'=>'required',
            'image' =>'required',
            'category_id' =>'required',
            'prix' =>'required',
         ]);

         if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $path = 'files/';
             $file = $request->file('image');
             $file_name = time().'_'.$file->getClientOriginalName();

          //    $upload = $file->storeAs($path, $file_name);
          $upload = $file->storeAs($path, $file_name, 'public');

             if($upload){
                 Product::insert([
                     'nom'=>$request->nom,
                     'image'=>$file_name,
                     'details'=> $request->details,
                     'prix' => $request->prix,
                     'category_id' => $request->category_id,   
                 ]);
                 return response()->json(['code'=>1,'msg'=>'New product has been saved successfully']);
             }
         }
    }

    /* method created for display current auth user info in  */
    public function profile(){
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        return view('admin.profile', ['email' => $email, 'name' => $name]);
    }

    public function modifyProfile(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return redirect()->route('admin.profile');
    } 

    public function changePass(Request $request){
       
        $request->validate([
            'password' => 'current_password',
            'newpass' => 'min:6|required_with:confirmpass|same:confirmpass',
            'confirmpass' => 'min:6'
        ],
        [
            'newpass.min' => 'The new passowrd must be at least 6 characters.',
            'confirmpass.min' => 'The confirm pass must be at least 6 characters',
        ]);

        
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->password = Hash::make($request->newpass);

        $user->save();
        return redirect()->route('admin.profile');
    }
}
