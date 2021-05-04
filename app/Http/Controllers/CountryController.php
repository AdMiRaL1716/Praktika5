<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCountry()
    {
        $continents = Continent::all();
        return view('countries/add-country', compact('continents'));
    }

    public function editCountry($id)
    {
        $country = Country::find($id);
        $continents = Continent::all();
        return view('countries/edit-country', compact('country', 'continents'));
    }

    public function deleteCountry($id)
    {
        $country = Country::find($id);
        return view('countries/delete-country', compact('country'));
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:countries'],
            'capital' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'population' => ['required', 'numeric', 'between:0,9999999999999999999'],
            'id_continent' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-country')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                $country = new Country();
                $country -> name = $data['name'];
                $country -> capital = $data['capital'];
                $country -> description = $data['description'];
                $country -> population = $data['population'];
                $country -> id_continent = $data['id_continent'];
                $country->save();
                return redirect('add-country')->with('status',"Insert successfully");
            }
            catch (Exception $e) {
                return redirect('add-country')->with('failed',"Operation failed");
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $country = Country::find($id);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'capital' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'population' => ['required', 'numeric', 'between:0,9999999999999999999'],
            'id_continent' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-country/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                $country -> name = $data['name'];
                $country -> capital = $data['capital'];
                $country -> description = $data['description'];
                $country -> population = $data['population'];
                $country -> id_continent = $data['id_continent'];
                $country->save();
                return redirect('edit-country/'.$id.'')->with('status',"Update successfully");
            }
            catch (Exception $e) {
                return redirect('edit-country/'.$id.'')->with('failed',"Operation failed");
            }
        }
    }

    public function delete($id) {
        $country = Country::find($id);
        try {
            $cities = City::query()->where('id_country', $id)->get();
            if (count($cities) != 0) {
                foreach ($cities as $city) {
                    $city = City::query()->where('id_country', $id)->delete();
                    $country->delete();
                }
            } else {
                $country->delete();
            }
            return redirect('home')->with('status',"Delete successfully");
        }
        catch (Exception $e) {
            return redirect('home')->with('failed',"Operation failed");
        }
    }
}
