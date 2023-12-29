<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regency;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index');
    }

    public function ajax_city_option(Request $request, $province_id)
    {
        $data = Regency::where('province_id', $province_id)
            ->orderBy('name', 'ASC')
            ->get()->all();
        $options = "<option value=''>-- SELECT CITY --</option>";
        foreach ($data as $key => $value) {
            $options.="<option value='".$value->id."'>".$value->name."</option>";
        }

        return $options;
    }
}
