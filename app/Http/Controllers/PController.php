<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model

class PController extends Controller
{
    public function index()
    {
        // // Fetch all products
        $products = Product::all();
        
        // // Pass the products data to the view
         return view('products.index', ['products' => $products]);
       
    }

    public function create()
    {
        // Return the create view
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required',
        ]);

        // Create a new product
        $product = new Product();
        $product->name = $request->name;
        $product->email = $request->email;
        $product->number = $request->number;
        $product->password = $request->password;
        $product->save(); 

        // Redirect back with success message
        return redirect()->back()->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        
        // Return the edit view with product data
        return view('products.update', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'password' => 'required',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);
        
        // Update product data
        $product->name = $request->name;
        $product->email = $request->email;
        $product->number = $request->number;
        $product->password = $request->password;
        $product->save(); 

        // Redirect back with success message
        return redirect()->back()->with('success', 'Student Updated successfully!');
    }

    public function destroy($id)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($id);
        $product->delete();
        
        // Redirect back with success message
        return redirect()->back()->with('success', 'Student Deleted successfully!');
    }
}
