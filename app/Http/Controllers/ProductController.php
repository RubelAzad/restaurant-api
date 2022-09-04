<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        // Get All products
        // get All Products From Database
        $products = Product::all();
        return response()->json($products);

    }


    /* public function store(Request $request)
    {
        //POST(request)
        // Store all information of Products to Database
        //in_array()

        $product = new Product();

        // image upload
        if($request->hasFile('photo')) {

        $allowedfileExtension=['pdf','jpg','png'];
        $file = $request->file('photo');
        $extenstion = $file->getClientOriginalExtension();
        $check = in_array($extenstion, $allowedfileExtension);

        if($check){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $product->photo = $name;
        }
        }


        // text data
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->save();
        return response()->json($product);


    }


    public function show($id)
    {
        // GET(id)
        // show each product by its ID from database
        $product = Product::find($id);
        return response()->json($product);
    }


    public function update(Request $request, $id)
    {
        // PUT(id)
        // Update Info by Id

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required'
         ]);

        $product = Product::find($id);


        // image upload
        if($request->hasFile('photo')) {

            $allowedfileExtension=['pdf','jpg','png'];
            $file = $request->file('photo');
            $extenstion = $file->getClientOriginalExtension();
            $check = in_array($extenstion, $allowedfileExtension);

            if($check){
                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $product->photo = $name;
            }
            }
        // text Data
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->save();

        return response()->json($product);

    }


    public function destroy($id)
    {
        // DELETE(id)
        // Delete by Id
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product Deleted Successfully');

    } */
}
