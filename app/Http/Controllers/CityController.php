<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:35',
            'CountryCode' => 'required|string|max:3',
            'District' => 'required|string|max:20',
            'Population' => 'required|integer',
        ]);

        $city = City::create($request->all());

        return response()->json($city, 201);
    }


    public function show($id)
    {
        $city = City::findOrFail($id);
        return response()->json($city);
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'Name' => 'required|string|max:35',
            'CountryCode' => 'required|string|max:3',
            'District' => 'required|string|max:20',
            'Population' => 'required|integer',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return response()->json($city);
    }

    
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(null, 204);
    }
}
