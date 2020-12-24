<!DOCTYPE html>
<html lang="en">
    <style>

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <head>
  <title>Add Location</title> 
   
 </head>
 
  <body> 
    <div class="control-group">
      <label class="control-label" for="nama">Alamat Lokasi</label>
      <div class="controls"> 
        <input id="alamat" name='alamatlokasi' placeholder="Masukan Alamat.." style="width:400px;" type="text" />
      </div>
    </div> 
    <div class="control-group">
      <label class="control-label" for="lat">latitude</label>
      <div class="controls">
        <input type="text" name='lat' id='lat'  >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="lng">Longitude</label>
      <div class="controls">
        <input type="text" name='lng' id='lng' >
      </div>
    </div>
  </body>
</html>
<input type="hidden" name="tempo" id="tempo">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK0Wk9CEkyOK4MtWPFkzvhBmxly_5TpU0&amp;libraries=places&v=3.31&callback=initMap&sensor=true"></script> 
<script type="text/javascript">
  google.maps.event.addDomListener(window, 'load', function () {
  var places = new google.maps.places.Autocomplete(document.getElementById('alamat'));
  google.maps.event.addListener(places, 'place_changed', function () {
      var place = places.getPlace();
      var address = place.formatted_address;
      var latitudeLongitude = place.geometry.location;
      var mesg = "Address: " + address;
      mesg += "\nLatitudeLongitude: " + latitudeLongitude;
    
      // alert(mesg);

      // document.getElementById('alamatnya').innerHTML=address;
      // var pisah = latitudeLongitude.split(",");
      // alert(latitudeLongitude);
      $('#tempo').val(latitudeLongitude);
      // $('#lat').val(pisah[0]);
      // $('#lng').val(latitudeLongitude);

      var ambildata = $('#tempo').val();
      var pisah     = ambildata.split(",");

     
     var str1 = pisah[0];
     var lat = str1.replace("(", "");

     var str2 = pisah[1];
     var lon = str2.replace(")", "");

     var str3 = lon;
     var long = str3.replace(" ", "");

     // alert(lat+"   "+long);
      $('#lat').val(lat);
      $('#lng').val(long);
    });
  });
</script>