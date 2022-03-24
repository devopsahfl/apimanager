<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Api;

use App\Models\Api;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search!= ""){
            $Api = Api::where('proccessName', 'LIKE', "$search%")->get();
        }else{
        $Api = Api::all();
        }
      return view ('Api.index')->with('Api', $Api)->with('search',$search);
    }

    public function create()
    {
        return view('Api.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        Api::create($input);
        return redirect('Api')->with('flash_message', 'Contact Addedd!');
    }

    public function show($id)
    {
        $Api = Api::find($id);
        return view('Api.show')->with('Api', $Api);
    }

    public function edit($id)
    {
        $Api = Api::find($id);
        return view('Api.edit')->with('Api', $Api);
    }

    public function update(Request $request, $id)
    {
        $Api = Api::find($id);
        $input = $request->all();
        $Api->update($input);
        return redirect('Api')->with('flash_message', 'Contact Updated!');
    }

    public function destroy($id)
    {
        Api::destroy($id);
        return redirect('Api')->with('flash_message', 'Contact deleted!'); 
    }
}
