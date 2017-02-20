<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Carwash;

class CarwashController extends Controller
{
    public function index()
    {
        return view('create');
    }

    public function create(Request $request)
    {


        Carwash::create($request->all());
        return 'success';

      //return "Success";
    }

    public function getcarwash()
    {


       $carwash = User::all();


       return $carwash;
        //return "Success";
    }

    public function bootmap()
    {
        return view('bootmap');
    }

    public function getCarWashByName($name){


        $carwash = User::whereName($name)->first();


        return $carwash;

    }

    public function login(){

        return view('login');

    }


    public function register(){


        return view('register');
    }
}
