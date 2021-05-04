<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContinentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addContinent()
    {
        return view('continents/add-continent');
    }

    public function editContinent($id)
    {
        $continent = Continent::find($id);
        return view('continents/edit-continent', compact('continent'));
    }

    public function deleteContinent($id)
    {
        $continent = Continent::find($id);
        return view('continents/delete-continent', compact('continent'));
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:continents'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-continent')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                $continent = new Continent();
                $continent -> name = $data['name'];
                $continent->save();
                return redirect('add-continent')->with('status',"Insert successfully");
            }
            catch (Exception $e) {
                return redirect('add-continent')->with('failed',"Operation failed");
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $continent = Continent::find($id);
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:continents'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-continent/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                $continent -> name = $data['name'];
                $continent->save();
                return redirect('edit-continent/'.$id.'')->with('status',"Update successfully");
            }
            catch (Exception $e) {
                return redirect('edit-continent/'.$id.'')->with('failed',"Operation failed");
            }
        }
    }

    public function delete($id) {
        $continent = Continent::find($id);
        try {
            $countries = Country::query()->where('id_continent', $id)->get();
            if (count($countries) != 0) {
                foreach ($countries as $country) {
                    $cities = City::query()->where('id_country', $country->id)->get();
                    if (count($cities) != 0) {
                        foreach ($cities as $city) {
                            $city = City::query()->where('id_country', $country->id)->delete();
                        }
                    }
                    $country = Country::query()->where('id_continent', $id)->delete();
                    $continent->delete();
                }
            } else {
                $continent->delete();
            }
            return redirect('home')->with('status',"Delete successfully");
        }
        catch (Exception $e) {
            return redirect('home')->with('failed',"Operation failed");
        }
    }
}
