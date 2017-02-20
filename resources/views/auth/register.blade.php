@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Your Car Wash</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}">

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Latitude</label>

                            <div class="col-md-6">
                                <input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude') }}" required autofocus>

                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('longitutde') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Longitude</label>

                            <div class="col-md-6">
                                <input id="longitutde" type="text" class="form-control" name="longitutde" value="{{ old('longitutde') }}" required autofocus>

                                @if ($errors->has('longitutde'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitutde') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('startclose') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Working Hours</label>

                            <div class="col-md-6">
                                <input id="startclose" type="text" class="form-control" name="startclose" value="{{ old('startclose') }}" required autofocus>

                                @if ($errors->has('startclose'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('startclose') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('motovehicle') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Moto Cost</label>

                            <div class="col-md-6">
                                <input id="motovehicle" type="text" class="form-control" name="motovehicle" value="{{ old('motovehicle') }}" required autofocus>

                                @if ($errors->has('motovehicle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('motovehicle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('salooncar') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Saloon Cost</label>

                            <div class="col-md-6">
                                <input id="salooncar" type="text" class="form-control" name="salooncar" value="{{ old('salooncar') }}" required autofocus>

                                @if ($errors->has('salooncar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salooncar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('trucks') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Heavy Duty Cost</label>

                            <div class="col-md-6">
                                <input id="trucks" type="text" class="form-control" name="trucks" value="{{ old('trucks') }}" required autofocus>

                                @if ($errors->has('trucks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trucks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('services') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Services</label>

                            <div class="col-md-6">
                                <input id="services" type="text" class="form-control" name="services" value="{{ old('services') }}" required autofocus>

                                @if ($errors->has('services'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('services') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
