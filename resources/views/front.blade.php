@extends('layouts.master')
@section('content')

    <div id="topbar"> <h2 style="text-align: center">Mohamed's CarWash Locator </h2></div>

    <div id="below">

       <div id="map">


       </div>
       <div id="leftSection">

           <h3>Click on Marker for Details</h3>

       </div>
    </div>



    @endsection

<div class="modal fade" id="favoritesModal"
     tabindex="-1" role="dialog"
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="favoritesModalLabel">Reserve a Spot</h4>
            </div>
            <div class="modal-body">
                <h6 id="inneralert" name="inneralert"> </h6>
                Phone number:<br>
                <input type="text" name="customername" id="customername"><br>
                Number Plate:<br>
                <input type="text" name="numberplate" id="numberplate"><br>

                Select Vehicle Type:<br>
                <select name="vehitype" id="vehitype">
                    <option>Saloon</option>
                    <option>Truck</option>
                    <option>Moto</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal">Close</button>
                <span class="pull-right">
          <button type="button" onclick="reserveSpot()"  class="btn btn-primary">
           Reserve
          </button>
        </span>
            </div>
        </div>
    </div>
</div>