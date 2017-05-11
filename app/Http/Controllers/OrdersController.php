<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Order;
use Response;
use Purifier;

class OrdersController extends Controller
{
  public function index()
  {
    $orders = Order::all();

    return Response::json($orders)

    $order = Auth::user();
    if($order->roleID ! = 1)
    {
      return Response::json(['error' => 'Not Allowed']);.0
    }
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
    $order->userID = $request->input('userID');
    $order->productID = $request->input('productID');
    $order->amount = $request->input('amount');
    $order->totalPrice = $request->input('totalPrice');
    $order->comment = $request->input('comment');

    $order->save();

    return Response::json(['success' => 'successful']);

  }
  public function show($id)
  {
    $order = Order::find($id);

    return Response::json($order);
  }
  //Delete a single Articles
  public function destroy($id)
  {
    $order = Order::find($id);

    $order->delete();

    return Response::json(['success' => 'Deleted Article.']);
  }

}


}
