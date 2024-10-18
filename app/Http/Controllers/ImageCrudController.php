<?php

namespace App\Http\Controllers;


use App\Models\ImageCrud;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Ramsey\Uuid\v1;

class ImageCrudController extends Controller
{
public function all_products()
{
    $products=ImageCrud::all();
    // return $products;
    return view('products',compact('products'));
}
public function add_new_product()
{
    return view('add_new_product');
}
public function store_product(Request $request)
{
    // dd($request->all());
    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,avif,jfif|max:2048',
    ]);
   $imageName="";
    if ($image=$request->file('image')) {
        $imageName=time().'.'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/products'), $imageName);
    }
    ImageCrud::create([ 
        'name' => $request->name,
        'image' => $imageName,
    ]);
Session::flash('success', 'Product Added Successfully');
    return redirect()->route('all.product');
}
public function edit_product($id)
{
    $product=ImageCrud::findOrFail($id);
    return view('edit_product',compact('product'));
}
public function update_product($id,Request $request)
{
    // $request->validate([
    //     'name' => 'required',
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,avif,jfif|max:2048',
    // ]);
    // $product=ImageCrud::findOrFail($id);
    // $imageName=$product->image;
    // if ($image=$request->file('image')) {
    //     $imageName=time().'.'.uniqid().'.'.$image->getClientOriginalExtension();
    //     $image->move(public_path('images/products'), $imageName);
    // }
    // $product->update([ 
    //     'name' => $request->name,
    //     'image' => $imageName,
    // ]);
    // Session::flash('success', 'Product Updated Successfully');
    // return redirect()->route('all.product');
    $product=ImageCrud::findOrFail($id);

    $request->validate([
        'name' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,avif,jfif|max:2048',
    ]);
   $imageName="";
   $deleteOldImage='images/products/'.$product->image;

    if ($image=$request->file('image')) {
        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        $imageName=time().'.'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/products'), $imageName);
    }
    else{
        $imageName=$product->image;
    }
    ImageCrud::where('id',$id)->update([
        'name' => $request->name,
        'image' => $imageName,
        
    ]);
Session::flash('success', 'Product updated Successfully');
    return redirect()->route('all.product');
}
public function delete_product($id)
{ 
    $product=ImageCrud::findOrFail($id);
    $deleteOldImage='images/products/'.$product->image;
    if (file_exists($deleteOldImage)) {
        File::delete($deleteOldImage);
    }
    $product->delete();
    Session::flash('success', 'Product Deleted Successfully');
    return redirect()->route('all.product');
}
}
