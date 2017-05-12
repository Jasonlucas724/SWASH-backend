<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Role;
use Response;
use Purifier;

class RolesController extends Controller
{

  public function index()
  {
    $roles = Role::all();

    return Response::json($roles);
  }

  public function store(Request $request)
  {
    $rules = [
      'name' => 'required'
    ];

    $validator = Validator::make(Purifier::clean($request->all()), $rules);

    if($validator->fails())
    {
      return Response::json(["error" => "You need to fill out all fields."]);
    }

    $role = new Role;
    $role->title = $request->input('title');


    $role->save();

    return Response::json(['success' => 'Congrats! You did it.']);
  }

  public function update($id, Request $request)
  {

    $role = Role::find($id);


    $role->title = $request->input('name');

    $article->save();


    return Response::json(["success" => "Article Updated"]);
  }

  public function show($id)
  {
    $role = Role::find($id);

    return Response::json($role);
  }

  public function destroy($id)
  {
    $role = Role::find($id);

    $role->delete();

    return Response::json(['success' => 'Deleted Article.']);
  }

}
