<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Product;
 
   class ProductController extends Controller
   {
    public function index(Request $request)
    {
    // Get the search query from the request
    $search = $request->input('search');

    // Fetch products, filtered by search term if provided
    $products = Product::when($search, function ($query, $search) {
        return $query->where('title', 'like', '%' . $search . '%');
    })
    ->orderBy('id', 'desc') // Keep sorting by id in descending order
    ->get();

    // Get the total count of products (this should reflect the filtered count if search is applied)
    $total = $products->count();

    // Return the view with products and total
    return view('admin.product.home', compact('products', 'total'));
    }


 
    public function create()
    {
        return view('admin.product.create');
    }
 
    public function save(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'stock' => 'required',
        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Product Add Successfully');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.products/create'));
        }
    }
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.product.update', compact('products'));
    }
 
    public function delete($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Product Deleted Successfully');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Product Not Delete successfully');
            return redirect(route('admin/products'));
        }
    }
 
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $title = $request->title;
        $category = $request->category;
        $price = $request->price;
        $discount = $request->discount;
        $stock = $request->stock;
 
        $products->title = $title;
        $products->category = $category;
        $products->price = $price;
        $products->discount = $discount;
        $products->stock = $stock;
        $data = $products->save();
        if ($data) {
            session()->flash('success', 'Product Update Successfully');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/products/update'));
        }
    }
}