<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;

class ProductController extends Controller
{
    function create()
    {
        return view('product.create');
    }

    function list()
    {
        
        return view('product.list');



    }

    

    function details()
    {
        return view('product.details');
        
    }

    function addproduct(Request $req)
    {
       $this->validate($req,
            [
                'productname'=>'required|max:15|regex:/^[\pL\s\-]+$/',
                'price'=>'required|min:4|regex:/^[0-9]+$/'
            ],
            [
                "productname.required"=> "Please provide Product name",
                "productname.max"=> "Product Name should not exceed 10 characters",
                "productname.regex"=> "Product name only contain characters",
                "price.required"=> "Please provide Product Price",
                "price.min"=> "Product price should be more than 3 number",
                "price.regex"=> "Product price only contain numbers"

            ]
        );

               return "Product add Successfully";
    }
}
