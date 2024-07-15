<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminEmail = 'admin@example.com';
    private $adminPassword = 'password123';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($credentials['email'] == $this->adminEmail && $credentials['password'] == $this->adminPassword) {
            session(['admin_authenticated' => true]);
            return redirect()->route('admin/tambah');
        }

        // Authentication failed, redirect back to login with input
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        $data['products'] = Product::all();
        $data['users'] = User::all();
        $data['productChart'] = Product::orderBy('price', 'desc')->take(10)->get();

        return view('admin.dashboard', $data);
    }
    
    public function index()
    {
        // Simulate product data
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Description for product 1',
                'stock' => 10,
                'price' => 100,
                'size' => 'Large'
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'stock' => 5,
                'price' => 200,
                'size' => 'Medium'
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for product 3',
                'stock' => 15,
                'price' => 150,
                'size' => 'Small'
            ]
        ];

        return view('admin.tambah', ['products' => $products]);
    }

    public function edit()
    {
        $data['product'] = Product::all();
        return view('admin.list-edit', $data);
    }

    public function tambah()
    {
        $data['users'] = User::all();
        return view('admin.tambah', $data);
    }
}
