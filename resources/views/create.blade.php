@extends('layouts.master')
@section('content')


<div class="container">

<h1>Register Your Car Wash</h1>

<form method="POST" action="/carwash">
    {{ csrf_field() }}

    Company Name:<br>
    <input type="text" name="name"><br>
    Contact Phone:<br>
    <input type="text" name="phone"><br>
    Address:<br>
    <input type="text" name="address"><br>
    Latitude:<br>
    <input type="text" name="latitude" id="latitude"><br>
    longitude:<br>
    <input type="text" name="longitutde" id="longitutde"><br>
    Working Hours:<br>
    <input type="text" name="startclose"><br>

    Moto Vehicle Cost:<br>
    <input type="text" name="motovehicle"><br>

    Saloon Car Cost:<br>
    <input type="text" name="salooncar"><br>


    Heavy Weight Duty  Cost:<br>
    <input type="text" name="trucks"><br>

    Services:<br>
    <input type="text" name="services"><br>
    <BR>

    <input type="submit" value="Register"><br>


</form>

</div>
@endsection




