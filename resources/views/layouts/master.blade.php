<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Car Wash
    </title>

    </meta>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/signin.css')}}">

    </link>



</head>
<body>


{{-- Google map api  --}}

<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzAHzZcl9Gr_Ffjrexo7aLhLsg8Uo8mbs&libraries=places,drawing,geometry">
</script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/ajaxsearch.js')}}"></script>




@yield('content')


@yield('js')

</body>
</html>