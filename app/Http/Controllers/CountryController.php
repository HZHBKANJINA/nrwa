<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function create()
    {
        // Ovo je obično za vraćanje pogleda u web aplikaciji, nije neophodno za API
    }

    public function store(Request $request)
    {
        $request->validate([
            'Code' => 'required|string|max:3',
            'Name' => 'required|string|max:52',
            'Continent' => 'required|string',
            'Region' => 'required|string|max:26',
            'SurfaceArea' => 'required|numeric',
            'IndepYear' => 'nullable|integer',
            'Population' => 'required|integer',
            'LifeExpectancy' => 'nullable|numeric',
            'GNP' => 'nullable|numeric',
            'GNPOld' => 'nullable|numeric',
            'LocalName' => 'required|string|max:45',
            'GovernmentForm' => 'required|string|max:45',
            'HeadOfState' => 'nullable|string|max:60',
            'Capital' => 'nullable|integer',
            'Code2' => 'required|string|max:2',
        ]);

        $country = Country::create($request->all());

        return response()->json($country, 201);
    }

    public function show($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function edit($id)
    {
        // Ovo je obično za vraćanje pogleda u web aplikaciji, nije neophodno za API
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Code' => 'required|string|max:3',
            'Name' => 'required|string|max:52',
            'Continent' => 'required|string',
            'Region' => 'required|string|max:26',
            'SurfaceArea' => 'required|numeric',
            'IndepYear' => 'nullable|integer',
            'Population' => 'required|integer',
            'LifeExpectancy' => 'nullable|numeric',
            'GNP' => 'nullable|numeric',
            'GNPOld' => 'nullable|numeric',
            'LocalName' => 'required|string|max:45',
            'GovernmentForm' => 'required|string|max:45',
            'HeadOfState' => 'nullable|string|max:60',
            'Capital' => 'nullable|integer',
            'Code2' => 'required|string|max:2',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());

        return response()->json($country);
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return response()->json(null, 204);
    }
}
