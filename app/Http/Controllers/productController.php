<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{    
    public function index()
    {
        return view('auth.home',['products'=>Product::get()]);
    }
    // public function create()
    // {
    //     return view('products.create');
    // }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->email = $request->email;
        $product->number = $request->number;
        $product->password = $request->password;
        $product->save(); 

        return redirect()->back()->with('success', 'Product added successfully!');
    }
    public function update($id)
    {
        $product = Product::findOrFail($id);
        return view('auth.update', compact('product'));
    }
    public function edit(Request $request,$id)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->email = $request->email;
        $product->number = $request->number;
        $product->password = $request->password;
        $product->save(); 

        return redirect()->back()->with('success', 'Product Updated successfully!');
    }
    public function destroy($id)
    {  
       
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product Updated successfully!');
    }
  
}
