<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('auth.login');
    }
  
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],

        [
            'email'=>'*Isi email!',       
            'password'=>'*Isi password!',       
        ]);

        $dataUser = [
            'nama'=>'Andre Firmansyah',
            'email' => 'andre@gmail.com',
            'password' => 'password',
            'path' => 'logo.png',
        ];

        if($request->email == $dataUser['email'] && $request->password == $dataUser['password']){
            session(['dataUser'=>$dataUser]);
            return redirect()->route('dashboard');
        }
        
        return redirect()->back()->with('error','Email atau password salah')->withInput($request->except('password'));

    }

    public function createProduct($namaBarang, $hargaBarang, $stokBarang, $jenisBarang, $pathGambar)
    {
        return [
            'namaBarang'=>$namaBarang,
            'hargaBarang'=>$hargaBarang,
            'stokBarang'=>$stokBarang,
            'jenisBarang'=>$jenisBarang,
            'pathGambar'=>$pathGambar
        ];
    }

    public function dashboard(){
        $products=[
            $this->createProduct('Ice Tea', 3000, 10, 'Drink', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxrsMjGIsLdlJL-Z2g2DJYopl3KSUlp3UCQ&s'),
            $this->createProduct('Orange Juice', 5000, 8, 'Drink', 'https://cdn.healthyrecipes101.com/recipes/images/juices/orange-juice-apple-cider-vinegar-honey-recipe-clavzz7uu001z551b961w6b6a.webp'),
            $this->createProduct('Mineral Water', 2000, 20, 'Drink', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKXhZop6TacZRHeIhzvap1wT7KLZn-UPhang&s'),
            $this->createProduct('Nasi Goreng', 6000, 5, 'Food', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd92feoTWXQuHTUzP8UUf9AzV2xiJr58PRig&s'),
            $this->createProduct('Sego Pecel', 7000, 7, 'Food', 'https://img-global.cpcdn.com/recipes/03d267f3917cb7f8/400x400cq70/photo.jpg'),
            $this->createProduct('Chocolatos', 8000, 4, 'Snack', 'https://arti-assets.sgp1.cdn.digitaloceanspaces.com/renyswalayanku/products/c23994fb-0039-4968-a6e9-c74a84935fc3.jpg'),
            $this->createProduct('Goreoreo', 500, 4, 'Snack', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaQQzYADkp3mBc5mGsc2DJCB54tHhj4j0EiA&s'),
            $this->createProduct('tic tac toe', 2000, 4, 'Snack', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm78T6KNKIP-mtNTyA0veI7StO_ZDyt2feWw&s'),
        ];
        return view('dashboard',compact('products'));
    }
    public function indexProfil(){
        $dataUser= session('dataUser');
        return view('profile', ['dataUser' => $dataUser]);
    }

    public function logout(){
           Session::flush();
         return redirect()->route('index');
    }
}
