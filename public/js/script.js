var map;
var myLatLng;
var dict = {};
var storedPhoneSession;
var data;
var htmllvalue;
var currentLat;
var currentLong;
var lat ;
var long;
$(document).ready(function () {
    /***
    $('#favoritesModal').on('hidden.bs.modal', '.modal', function () {
        $(e.target).removeData("bs.modal").find(".modal-content").empty();

    });
    // Delegating to `document` just in case.
     **/
    $(document).on("hidden.bs.modal", "#favoritesModal", function () {
        $(this).find("#inneralert").html(""); // Just clear the contents.
      //  $(this).find("#info").remove(); // Remove from DOM.
    });


    geolocationInit();
    function geolocationInit() {

        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success,fail);
        }else{

            alert("Browser not supported")
        }
    }
    function success(position) {

        console.log(position)

        var latval = position.coords.latitude;
        var longval = position.coords.longitude;


        currentLat =latval;
        currentLong  = longval;
        myLatLng =  new google.maps.LatLng( currentLat, currentLong);
       // setLatLong(latval,longval);
        //createMap(myLatLng)
        setLatLong(latval,longval);
        renderGoogleMap(latval,longval)

    }
    function fail() {
        alert("it fail")
    }
    function setLatLong(latval,longval) {


        if(document.getElementById("latitude") != null){
            document.getElementById("latitude").value = latval;
            document.getElementById("longitutde").value = longval;

        }

    }
    function getMiles(i) {
        return i*0.000621371192;
    }
    function getMeters(i) {
        return i*1609.344;
    }
    function sortJsObject( dict) {
       // var dict = {"x" : 1, "y" : 6,  "z" : 9, "a" : 5, "b" : 7, "c" : 11, "d" : 17, "t" : 3};

        var keys = [];
        for(var key in dict) {
            keys[keys.length] = key;
        }

        var values = [];
        for(var i = 0; i < keys.length; i++) {
            values[values.length] = dict[keys [i]];
        }

        var sortedValues = values.sort(sortNumber);
        console.log(sortedValues);

        return sortedValues;
    }
// this is needed to sort values as integers
    function sortNumber(a,b) {
        return a - b;
    }
    function renderGoogleMap(latval,longval) {
        var start_point = new google.maps.LatLng(latval, longval);

        // Creating a new map
         map = new google.maps.Map(document.getElementById("map"), {
            center: start_point,
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        function setMarkerPoints(map, marker) {
            var bounds = new google.maps.LatLngBounds();


            $.ajax({
                type: "GET",
                url: '/carwash/getall',
                dataType: "json",
                success: function(data) {



                    if (data.length !== 0) {

                             this.data=data;
                        $.each(data, function(marker, data) {

                             //  console.log(data.motovehicle)
                            var latLng = new google.maps.LatLng(data.latitude, data.longitutde);
                            bounds.extend(latLng);

                            // Creating a marker and putting it on the map
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map,
                                title: data.name
                            });
  var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(currentLat,currentLong), new google.maps.LatLng(data.latitude,data.longitutde));

                            dict[data.name]= Math.round( getMiles(distance) * 100) / 100

                            var windowContent =
                                '<a href="#" onclick="loopData()" >View All </a>'+
                                '<h3>' + data.name + '</h3>' +
                                '<p>' + '<B>' +"Call Us :  " +'</B>' + data.phone + '</p>' +
                                '<p>' + '<B>' +"Address :  " +'</B>'  + data.address + '</p>' +
                                '<p>' + '<B>' +"Moto Vehicle :  " +'</B>'+ "GHS " +  data.motovehicle + '</p>' +
                                '<p>' + '<B>' +"Saloon Cars :  " +'</B>' + "GHS " + data.salooncar + '</p>' +
                                '<p>' + '<B>' +"Trucks :  " +'</B>' + "GHS " + data.trucks + '</p>' +
                                '<p>' + '<B>' +"We Offer :  " +'</B>'  + data.services + '</p>' +
                                '<p>' + '<B>' +"We are Opened From :  " +'</B>'  + data.startclose + '</p>'+

                                '<button type="button"  data-toggle="modal"data-target="#favoritesModal"  class="btn btn-info ">Book Reservation</button>';


                            storedPhoneSession = data.phone;




                            google.maps.event.addListener(marker, 'click', function() {

                                // Open this map's infobox
                            /*    infobox.open(map, marker);
                                infobox.setContent(windowContent);
                                map.panTo(marker.getPosition());
                                infobox.show();*/


                              document.getElementById("leftSection").innerHTML  = windowContent;

                            });
                            google.maps.event.addListener(map, 'click', function() {

                            });
                        });
                        map.fitBounds(bounds);

                     //   var htmllvalue = "Nearest Washing Bays"+ '<br><br>';

                        for (var key in dict) {
                            var value = dict[key];

                            htmllvalue = '<a href="#" onClick="getCarWashDetails(\'' + key +'\')"> '+ key +' </a>'    + " : " +  '<b>' + value  + '</b>' + " miles " + '<br>';

                            document.getElementById('leftSection').innerHTML += htmllvalue;
                        }







                        //end here

                    }

                },
                error: function(data) {
                    console.log('Please refresh the page and try again');
                }
            });
            //END MARKER DATA
            var windowContent = "";

            document.getElementById("leftSection").innerHTML  = windowContent;
        }
        setMarkerPoints(map);
    }

    window.reserveSpot = function reserveSpot() {
/**
 * 'carwashphone',
 'customerphone',
 'carnumber',
 'vehicletype'
 *
 *
 * */
        var customername = $('#customername').val();
        var numberplate = $('#numberplate').val();
        var vehitype = $('#vehitype').val();
        var companyNumber = storedPhoneSession;

        $.ajax({
            method: "POST",
            url:'/reservation',
            data: {carwashphone: companyNumber, customerphone: customername, carnumber: numberplate, vehicletype: vehitype},
            success: function( msg ) {

    console.log(msg);
                var time = moment().add('m', 60).format("dddd, MMMM Do YYYY, h:mm:ss a");
               // var newTime = moment(time).add('m', 30);



                $('#inneralert').html('Spot reserved,Reservation will expire '+ '<b>' + time +'</b>');
                $( '#inneralert' ).css( "color", "green" );
                $( '#inneralert' ).css("text-align", "center");
                $('#customername').val('');
                $('#numberplate').val('');
                storedPhoneSession = ""
                //   $('#vehitype').val('');
            },
            error: function (msg) {
                $('#inneralert').text('Failed to reserve spot,Try Again');
                $( '#inneralert' ).css( "color", "red" );
                $( '#inneralert' ).css("text-align", "center");
            }
        });
    }
    window.getCarWashDetails = function getCarWashDetails(name) {


        $.ajax({

            type:"GET",
            url:'/carwash/getByname/'+name,
            dataType: 'json',
            success: function(data){
                console.log(data);

                lat= data.latitude;
                long = data.longitutde;
                console.log('latitude' + lat);


                var windowContent =
                    '<a href="#" onclick="loopData()">View All </a>'+
                    '<h3>' + data.name + '</h3>' +
                    '<p>' + '<B>' +"Call Us :  " +'</B>' + data.phone + '</p>' +
                    '<p>' + '<B>' +"Address :  " +'</B>'  + data.address + '</p>' +
                    '<p>' + '<B>' +"Moto Vehicle :  " +'</B>'+ "GHS " +  data.motovehicle + '</p>' +
                    '<p>' + '<B>' +"Saloon Cars :  " +'</B>' + "GHS " + data.salooncar + '</p>' +
                    '<p>' + '<B>' +"Trucks :  " +'</B>' + "GHS " + data.trucks + '</p>' +
                    '<p>' + '<B>' +"We Offer :  " +'</B>'  + data.services + '</p>' +
                    '<p>' + '<B>' +"We are Opened From :  " +'</B>'  + data.startclose + '</p>'+

                    '<button type="button"  data-toggle="modal" data-target="#favoritesModal"  class="btn btn-info ">Book Reservation</button>';


                storedPhoneSession = data.phone;
                document.getElementById("leftSection").innerHTML  = windowContent;

                var myLatlng = new google.maps.LatLng(lat,long);
                console.log( 'longitude' + lat);
                map.panTo(myLatlng);map.setZoom(18);


            },
            error: function(data){

            }
        })


    }
    window.loopData = function loopData() {

        document.getElementById('leftSection').innerHTML = "";
        $.ajax({
            type: "GET",
            url: '/carwash/getall',
            dataType: "json",
            success: function(data) {

                if (data.length !== 0) {

                    this.data=data;
                    $.each(data, function(marker, data) {


                        var distance = google.maps.geometry.spherical.computeDistanceBetween(
                            new google.maps.LatLng(currentLat,currentLong),
                            new google.maps.LatLng(data.latitude,data.longitutde));

                        dict[data.name]= Math.round( getMiles(distance) * 100) / 100

                        var windowContent =
                            '<a href="#" onclick="loopData()" >View All </a>'+
                            '<h3>' + data.name + '</h3>' +
                            '<p>' + '<B>' +"Call Us :  " +'</B>' + data.phone + '</p>' +
                            '<p>' + '<B>' +"Address :  " +'</B>'  + data.address + '</p>' +
                            '<p>' + '<B>' +"Moto Vehicle :  " +'</B>'+ "GHS " +  data.motovehicle + '</p>' +
                            '<p>' + '<B>' +"Saloon Cars :  " +'</B>' + "GHS " + data.salooncar + '</p>' +
                            '<p>' + '<B>' +"Trucks :  " +'</B>' + "GHS " + data.trucks + '</p>' +
                            '<p>' + '<B>' +"We Offer :  " +'</B>'  + data.services + '</p>' +
                            '<p>' + '<B>' +"We are Opened From :  " +'</B>'  + data.startclose + '</p>'+

                            '<button type="button"  data-toggle="modal"data-target="#favoritesModal"  class="btn btn-info ">Book Reservation</button>';


                        storedPhoneSession = data.phone;





                    });


                    for (var key in dict) {
                        var value = dict[key];

                        htmllvalue = '<a href="#" onClick="getCarWashDetails(\'' + key +'\')"> '+ key +' </a>'    + " : " +  '<b>' + value  + '</b>' + " miles " + '<br>';

                        document.getElementById('leftSection').innerHTML += htmllvalue;
                    }







                    //end here

                }

            },
            error: function(data) {
                console.log('Please refresh the page and try again');
            }
        });

    }

    window.loopReservations = function loopReservations() {

        $.ajax(
            {
                type: "GET",
                url: "carwash/reservations",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data) {
console.log(data);
                    $('#reservations > tbody').empty();
                    var trHTML = '<tbody>';
                    $.each(data, function (i, item) {
                        trHTML += '<tr><td>' + item.customerphone + '</td><td>' + item.carnumber + '</td><td>' + item.vehicletype + '</td> <td>' +
                            '<button type="button" id='+item.id+' onClick="removeReservation(\'' + item.id +'\')" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> Remove</button>' +
                            '</td></tr>';
                    });
                    $('#reservations').append(trHTML + '</tbody>');

                },

                error: function (msg) {

                    //alert(msg.responseText);
                }
            });

    }
    loopReservations();
    window.removeReservation=function removeReservation(id) {


        $.ajax(
            {
                type: "DELETE",
                url: "carwash/reservations/delete/"+id,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data) {
                    console.log(data);

                    loopReservations("");

                },

                error: function (msg) {
                    console.log(msg);
                    //alert(msg.responseText);
                }
            });
    }
    window.zoomMap= function zoomMap(lat, lng) {

        $.ajax({

            type:"GET",
            url:'/carwash/getByname/'+name,
            dataType: 'json',
            success: function(data){
                console.log(data);

               // 'latitude',
                //    'longitutde

                var myLatlng = new google.maps.LatLng(data.latitude, data.longitutde);
                map.panTo(myLatlng);

               // storedPhoneSession = data.phone;
               // document.getElementById("leftSection").innerHTML  = windowContent;
            },
            error: function(data){

            }
        })


    }

})


/*
 function createMap(myLatLng) {
 // Create a map object and specify the DOM element for display.
 map = new google.maps.Map(document.getElementById('map'), {
 center:myLatLng,
 mapTypeId:'terrain',
 zoom: 15
 });

 /!* var marker = new google.maps.Marker({
 position:myLatLng,
 map:map

 })*!/

 }
 function nearbySearch(myLatLng,type) {

 var request = {
 location: myLatLng,
 radius: '2500',
 types: [type]
 };

 service = new google.maps.places.PlacesService(map);
 service.nearbySearch(request, callback);


 function callback(results, status) {

 console.log(results)
 if (status == google.maps.places.PlacesServiceStatus.OK) {
 for (var i = 0; i < results.length; i++) {
 var place = results[i];

 latlng = place.geometry.location;
 name= place.name;
 createMarker(latlng,name);
 }
 }
 }



 }
 function createMarker(latlng,name) {
 var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
 var marker = new google.maps.Marker({
 position: latlng,
 map: map,
 icon:iconBase + 'parking_lot_maps.png',
 title: name

 });
 }

 function getLocation() {



 $.get('/carwash/getall', function(data){
 console.log(data);
 });

 }*/