<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Auth;
class ReservationController extends Controller
{


    public function index()
    {
        return "";
    }


    public function create(Request $request){

     $reservation = Reservation::create($request->all());
        return $reservation;

    }

    public function getReservationsByName(){


        $userphone = Auth::user()->phone;
        //print( $userphone);
            $reservation = Reservation::where('carwashphone', '=', $userphone)->get();


          //$userphone;
         return  $reservation ;
    }
    public function removeReservation($id){
        $userphone = Auth::user()->phone;
        $deletedRows = Reservation::where('id', $id)->delete();
        $reservation = Reservation::where('carwashphone', '=', $userphone)->get();


        //$userphone;
        return  $reservation ;
    }
}
