@extends('layouts.app')

@section('content')



    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <b>Reservations</b></div>

                <div class="panel-body">
                    <table id="reservations" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Phone</th>
                            <th>Number plate</th>
                            <th>Service required</th>

                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
