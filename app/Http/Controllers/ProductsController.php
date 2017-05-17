<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function __construct()
{
    $this->middleware("jwt.auth", ["only" => ["store", "update", "destroy"]]);
}

  public function index()
  {
    $products = Product::all();

    return Response::json($articles);
  }
  //Stores our Articles
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required',
      'description' => 'required',
      'image' => 'required',
      'price' => 'required',
      'categoryID' => 'required',
      'availibility' => 'required',
    ];

    $validator = Validator::make(Purifier::clean($request->all()), $rules);

    if($validator->fails())
    {
      return Response::json(["error" => "You need to fill out all fields."
    }
    $user = Auth::user();
    if($user->roleID != 1)
    {
      return Response::json(['error' => 'Not Authorized']);
    }
    $product = new Product;
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->categoryID = $request->input('category');
    $product->availibility = $request->input('availibility');

    $image = $request->file('image');
    $imageName = $image->getClientOriginalName();
    $image->move("storage/", $imageName);
    $product->image = $request->root()."/storage/".$imageName;

    $product->save();

    return Response::json(['success' => 'Congrats! You did it.']);

  }
  //Update our Articles.
  public function update($id, Request $request)
  {
    //Finds a specific Article based on ID.
    $product = Product::find($id);

    $user = Auth::user();
    if($user->roleID != 1)
    {
      return Response::json(['error' => 'Not Authorized']);
    }
    //Saves the Title
    $product->name = $request->input('title');
    //Saves the Body
    $product->body = $request->input('body');

    //Moves the Image to the server and saves the Image URL to the DB.
    $image = $request->file('image');
    $imageName = $image->getClientOriginalName();
    $image->move("storage/", $imageName);
    $product->image = $request->root(). "/storage/".$imageName;

    //Commits the Saves to the DataBase.
    $product->save();

    //Sends a message back to the Front-End.
    return Response::json(["success" => "Article Updated"]);
  }
  //Show single Article
  public function show($id)
  {
    $product = Product::find($id);

    return Response::json($article);
  }
  //Delete a single Articles
  public function destroy($id)
  {
    $product = Product::find($id);

    $product->delete();

    return Response::json(['success' => 'Deleted Article.']);
  }
}
