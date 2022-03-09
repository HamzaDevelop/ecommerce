<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Utilities\CommonHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function __construct(){
        //
    }

    /* Product Listing */
    public function index(){
        
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')->
                    select('products.id as id', 'categories.id as category_id', 'name', 'category_name', 'products.image as image', 'categories.image as category_image', 'quantity', 'purchase_price', 'active', 'sale_price', 'description', 'short_description')->
                    get();


        return view('AdminTemplate.products.list', compact('products'));
    }

    /* View Product Details */
    public function view($product_id){

        $product = Product::where('products.id', $product_id)->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.id as id', 'categories.id as category_id', 'name', 'category_name', 'products.image as image', 'categories.image as category_image', 'quantity', 'purchase_price', 'active', 'sale_price', 'description', 'short_description')
                    ->first();
        
        return view("AdminTemplate.products.view", compact('product'));

        die();
    }

    /* Add New Product Page */
    public function create(){

        $categories = Category::categoriesWithSubCategoriesArray();
        
        return view('AdminTemplate.products.add', compact('categories'));

    }

    /* Add New Product */
    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|unique:products, name',
            'category' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|integer',
            'sale_price' => 'required|integer|gt:purchase_price',
            'purchase_price' => 'required|integer|lt:sale_price'
        ]);

        $data = $request->all();

        if(isset($data['image'])){
            
            $imageName = time().'-'.$data['name'].'.'.$request->image->extension();  

            $request->image->move(public_path('products/images'), $imageName);

            $insert = Product::create([
                'name' => $data['name'],
                'category_id' => $data['category'],
                'quantity' => $data['quantity'],
                'purchase_price' => $data['purchase_price'],
                'sale_price' => $data['sale_price'],
                'active' => 1,
                'image' => '/products/images/'.$imageName,
                'short_description' => $data['short_description'],
                'description' => $data['description']
            ]);

        } else{

            $insert = Product::create([
                'name' => $data['name'],
                'category_id' => $data['category'],
                'quantity' => $data['quantity'],
                'purchase_price' => $data['purchase_price'],
                'sale_price' => $data['sale_price'],
                'active' => 1,
                'short_description' => $data['short_description'],
                'description' => $data['description']
            ]);
        }

        if(!$insert){

            session()->flash('error','Unknown error occured While Adding Product!');
            return redirect()->back()->withInput();

        }

        session()->flash('success','New Product has been Added Successfully!');
         
        return redirect("admin/products");

    }

    /* Edit Product Details page */
    public function edit($productId){

        $product = Product::where('products.id', $productId)->
                    join('categories', 'products.category_id', '=', 'categories.id')->
                    select('products.id as id', 'categories.id as category_id', 'name', 'category_name', 'products.image as image', 'categories.image as category_image', 'quantity', 'purchase_price', 'active', 'sale_price', 'description', 'short_description')->
                    first();

        $categories = Category::categoriesWithSubCategoriesArray();
        
        return view('AdminTemplate.products.edit', compact('product', 'categories'));
    }

    /* Update Product Details */
    public function update(Request $request){
        
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'category' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|integer',
            'sale_price' => 'required|integer|gt:purchase_price',
            'purchase_price' => 'required|integer|lt:sale_price'
        ]);

        $data = $request->all();

        if(isset($data['image'])){
            
            $imageName = time().'-'.$data['name'].'.'.$request->image->extension();  

            $request->image->move(public_path('products/images'), $imageName);

            $update = Product::where('id', $data['id'])->update([
                'name' => $data['name'],
                'category_id' => $data['category'],
                'quantity' => $data['quantity'],
                'purchase_price' => $data['purchase_price'],
                'sale_price' => $data['sale_price'],
                'active' => 1,
                'image' => '/products/images/'.$imageName,
                'short_description' => $data['short_description'],
                'description' => $data['description']
            ]);

        } else{

            $update = Product::where('id', $data['id'])->update([
                'name' => $data['name'],
                'category_id' => $data['category'],
                'quantity' => $data['quantity'],
                'purchase_price' => $data['purchase_price'],
                'sale_price' => $data['sale_price'],
                'active' => 1,
                'short_description' => $data['short_description'],
                'description' => $data['description']
            ]);
            
        }

        if(!$update){

            session()->flash('error','Unknown error occured While Updating Product!');
            return redirect()->back()->withInput();

        }

        session()->flash('success','New Product has been Updated Successfully!');
         
        return redirect("admin/products");
    }

    /* Delete Product */
    public function destroy($productId){
        
        $product = Product::find($productId);
        
        if($product){
            
            if($product->delete()){
                
                session()->flash('success', 'Product Deleted Successfully!');
                return redirect()->back();

            } else {
                
                session()->flash('error', 'Error Occured While Deleting Product!');
                return redirect()->back();

            }
        } else{

            session()->flash('error', 'Product Not Found!');
            return redirect()->back();

        }
    }
}
