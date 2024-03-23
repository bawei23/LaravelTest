<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        return view('product');
    }

    public function dataproduct(Request $request)
    {
       

        $product = Product::all();

        if (count($product) > 0) {
            foreach ($product as $row) {
                $publish = "No";
                if($row['publish'] == 1){
                    $publish = "Yes";
                }

                 $json['data'][] = array(
                    $row['id'],$row['name'],$row['price'],$row['detail'],$publish,''
                );
            }
        }else{
            $json['data'][] = array('','No matching records found','','','');
        }

        return json_encode($json);
    }

    public function create_product()
    {
        
        return view('create_product');
    }

    public function edit_product($id)
    {
       
        $product = Product::where('id',$id)->first(); 
        $id = $id;
        return view('edit_product', compact('product','id'));
    }

    public function detail_product($id)
    {
       
        $product = Product::where('id',$id)->first(); 
        $id = $id;
        return view('detail_product', compact('product','id'));
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'publish' => 'required',
        ]);
        
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->detail = $request->input('detail');
        $product->publish = $request->input('publish');

        $product->save();

        return redirect()->route('product');
    }

    public function update_product(Request $request)
    {
        
        $product = Product::findOrFail($request->input('product_id'));
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->detail = $request->input('detail');
        $product->publish = $request->input('publish');
       
        $product->save();

        return redirect()->route('product');
    }

    public function delete_product(Request $request)
    {
        $delete = Product::where('id',$request->product_id)->delete();

        return redirect()->route('product');
    }

}
