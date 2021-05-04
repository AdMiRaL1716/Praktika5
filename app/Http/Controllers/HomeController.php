<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Continent;
use App\Models\Country;

class HomeController extends Controller
{

    public function index()
    {
        $continents = Continent::all();
        return view('continents', compact('continents'));
    }

    public function countries($id)
    {
        $countries = Country::query()->where('id_continent', '=', $id)->get();
        return view('countries', compact('countries'));
    }

    public function country($id)
    {
        $country = Country::find($id);
        $continents = Continent::all();
        return view('country', compact('country', 'continents'));
    }

    public function cities($id)
    {
        $cities = City::query()->where('id_country', '=', $id)->get();
        return view('cities', compact('cities'));
    }

    public function city($id)
    {
        $city = City::find($id);
        $countries = Country::all();
        return view('city', compact('city', 'countries'));
    }
}
