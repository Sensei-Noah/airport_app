@extends('main')
@section('content')


        
    <div class="container d-flex justify-content-center">
        <h1 class="mt-3">Add an Airport</h1>
    </div>
    <div class="container border border-2 bg-dark p-2">
            
        <form action="/store_airport" method="post">

        @csrf
        @include('_partials.errors')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Airport Name</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="airport_name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Country</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_name">
            </div>
            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">location Latitude</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="latitude" id="latitude">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">location Longitude</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="longitude" id="longitude">
                </div>
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>

            <div class="input-group mb-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>



        <script>
            const latitude = document.getElementById('latitude');
            const longitude = document.getElementById('longitude');
            mapboxgl.accessToken ='pk.eyJ1IjoidGl0YXNueGx0IiwiYSI6ImNqZWs3ZHliejBjOWMzM284aG1nbG1yN3IifQ._nFPiSI4HSaZriIEDwRa8g'; //TODO: put in my own token

            let map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                doubleClickZoom: false
            });

            
            map.addControl(
                new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
                })
            );

            let marker = new mapboxgl.Marker()
            .setLngLat([30.5, 50.5])
            .addTo(map);

            map.on('dblclick', (e) => {
                marker.setLngLat(e.lngLat);
                latitude.value = `${e.lngLat.lat}`;
                longitude.value = `${e.lngLat.lng}`;
            })
        </script>
    </div>



@endsection