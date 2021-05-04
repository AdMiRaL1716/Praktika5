<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCity()
    {
        $countries = Country::all();
        return view('cities/add-city', compact('countries'));
    }

    public function editCity($id)
    {
        $city = City::find($id);
        $countries = Country::all();
        return view('cities/edit-city', compact('city', 'countries'));
    }

    public function deleteCity($id)
    {
        $city = City::find($id);
        return view('cities/delete-city', compact('city'));
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:cities'],
            'population' => ['required', 'numeric', 'between:0,9999999999999999999'],
            'id_country' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-city')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                $city = new City();
                $city -> name = $data['name'];
                $city -> population = $data['population'];
                $city -> id_country = $data['id_country'];
                $city->save();
                return redirect('add-city')->with('status',"Insert successfully");
            }
            catch (Exception $e) {
                return redirect('add-city')->with('failed',"Operation failed");
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $city = City::find($id);
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'population' => ['required', 'numeric', 'between:0,9999999999999999999'],
            'id_country' => ['required', 'int', 'max:20'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-city/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else {
            $data = $request->input();
            try {
                $city -> name = $data['name'];
                $city -> population = $data['population'];
                $city -> id_country = $data['id_country'];
                $city->save();
                return redirect('edit-city/'.$id.'')->with('status',"Update successfully");
            }
            catch (Exception $e) {
                return redirect('edit-city/'.$id.'')->with('failed',"Operation failed");
            }
        }
    }

    public function delete($id) {
        $city = City::find($id);
        try {
            $city->delete();
            return redirect('home')->with('status',"Delete successfully");
        }
        catch (Exception $e) {
            return redirect('home')->with('failed',"Operation failed");
        }
    }
}
