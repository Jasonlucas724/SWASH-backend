<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
  public function index()
  {
    $orders = Orders::all();

    return Response::json($orders)
  }

  public function store(Request $request)
  {
    $rules = [
      'userID' => 'required',
      'productID' => 'required',
      'amount' => 'required',
      'totalPrice' => 'required',
      'comment' => 'required',
    ];

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

    $order = new Order;
    $order->title = $request->input('title');
    $order->body = $request->input('body');
    $article->title = $request->input('title');
    $article->body = $request->input('body');

  }


}
