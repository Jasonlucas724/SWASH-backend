<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
  public function store(

  $validator = Validator::make(Purifier::clean($request->all()), $rules)



  $product = Product::find($request->input("productID");

  if(empty($product))
  {
    return Response::json(["error" => "Sorry! Product not available."])
  }
  $order->totalPrice = $request->input("amount")* $product->price;

  if($product->availability == >0)
  {
    return Response::json(["success" => "Item Found!"])
  }

  )
}
