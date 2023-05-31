<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;    

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,png',
            'quantity' => 'required'
        ]);

        // Upload
        $file = $request->file('photo');
        $path = 'photoforproducts';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);

        $product = new Product($request->all());
        $product->photo = $fileName;
        $product->save();
        $product->categories()->attach($request->input('categories'));

        return redirect()->route('products.index')
                         ->with('success', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product )  
    {
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         $request->validate([
             'name' => 'required',
             'price' => 'required',
             'description' => 'required',
             //'photo' => 'required',
             'photo' => 'image|mimes:jpg,png',
             'quantity' => 'required'
         ]);

        // // Upload

         $product->name = $request->name;
         $product->price = $request->price;
         $product->description = $request->description;
        $product->quantity = $request->quantity;

        if ($request->hasfile('photo')){
            $destination = 'photoforproducts/'.$product->photo;
            $file = $request->file('photo');
            $extention = $file->getClientOriginalName();
            $fileName = time().'.'.$extention;
            $file->move('photoforproducts/', $fileName);
            if(File::exists($destination)){
                File::delete($destination);
            }
            $product->photo = $fileName;
        }

        $product->save();
        $product->categories()->sync($request->input('categories'));

        return redirect()->route('products.index')
        ->with('success', 'Edited successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = Product::find($id);
        if (!$product){
            return response()->json(['error' => 'Error: User not found']);
        }
        $product->delete();
        $product->categories()->detach();
        return redirect()->route('products.index')
        ->with('success', 'Deleted successfully');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // "%{$keyword}%"
        $products = Product::query()->where('name', 'LIKE', '%' . $keyword . '%')
                                    ->get();
        return view('products.search', ['products' => $products]);
    }
}
