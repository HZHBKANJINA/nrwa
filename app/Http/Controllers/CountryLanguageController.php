<?php

namespace App\Http\Controllers;

use App\Models\CountryLanguage;
use Illuminate\Http\Request;

class CountryLanguageController extends Controller
{
    public function index()
    {
        $countryLanguages = CountryLanguage::all();
        return response()->json($countryLanguages);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'CountryCode' => 'required|string|max:3',
            'Language' => 'required|string|max:30',
            'IsOfficial' => 'required|string|max:1',
            'Percentage' => 'required|numeric',
        ]);

        $countryLanguage = CountryLanguage::create($request->all());

        return response()->json($countryLanguage, 201);
    }

    public function show($id)
    {
        $countryLanguage = CountryLanguage::findOrFail($id);
        return response()->json($countryLanguage);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'CountryCode' => 'required|string|max:3',
            'Language' => 'required|string|max:30',
            'IsOfficial' => 'required|string|max:1',
            'Percentage' => 'required|numeric',
        ]);

        $countryLanguage = CountryLanguage::findOrFail($id);
        $countryLanguage->update($request->all());

        return response()->json($countryLanguage);
    }

    public function destroy($id)
    {
        $countryLanguage = CountryLanguage::findOrFail($id);
        $countryLanguage->delete();

        return response()->json(null, 204);
    }
}
