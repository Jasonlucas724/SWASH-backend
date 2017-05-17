<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Response;
use Purifier;
use Hash;
use JWTAuth;
use File;
use Auth;

class CategoriesController extends Controller
{
  public function __construct()
{
    $this->middleware("jwt.auth", ["only" => ["store", "update", "destroy"]]);
}

  public function index()
  {
    $categories = Category::all();

    return Response::json($categories);
  }

  public function store(Request $request)
  {
    $rules = [
      'name' => 'required',
      ];
      $validator = Validator::make(Purifier::clean($request->all()), $rules);

      if($validator->fails())
      {
        return Response::json(["error" => "You need to fill out a category."]);
      }
      $user = Auth::user();
      if($user->roleID != 1)
      {
        return Response::json(['error' => 'Not Authorized']);
      }
      $category = new Category;
      $category->name = $request->input('name');

      $category->save();

      return Response::json(['success' => 'You did it.']);
  }

  public function update($id, Request $request)
  {
    //Finds a specific Category based on ID.
    $category = Category::find($id);

    //Saves the name
    $category->name = $request->input('name');

    //Commits the Saves to the DataBase.
    $category->save();

    //Sends a message back to the Front-End.
    return Response::json(["success" => "Category found."]);
  }

  public function show($id)
   {
     $category = Category::find($id);

     return Response::json($category);
   }


  public function delete($id)
 {
   $category = Category::find($id);

   $category->delete();

   return Response::json(['success' => 'Category Deleted.']);
 }

}
