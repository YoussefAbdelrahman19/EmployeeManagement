<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index() {

        $countries= Country::all();
        return view('countries.index',compact('countries'));
    }

    public function create() {

        return view('countries.create');
    }
    public function store(Request $request,Country $country) {

        return view('countries.update');
    }
}
