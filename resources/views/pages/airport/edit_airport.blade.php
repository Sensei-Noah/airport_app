@extends('main')
@section('content')
    <div class="container d-flex justify-content-center">
        <h1 class="mt-3">Edit an Airport</h1>
    </div>


    <div class="container border border-2 bg-dark p-2">

        <form action="/show_airport/update/{{ $airportCon -> id }}" method="post" enctype="multipart/form-data">

        @csrf
        @include('_partials.errors')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Airport Name</span>
                <input required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="airport_name" value="{{ $airportCon -> airport_name }}">
            </div>
            <div class="input-group mb-3">
                <select id="country" class="form-select" aria-label="Default select example" name="country_name">
                    <option disabled>Country Selection</option>
                    @foreach ($country as $countries)
                        {{-- Adding selected tag for convenience --}}
                        @if ($countries-> country_name == $airportCon-> country_name)
                        <option value="{{ $countries-> country_name }}" data-ISO="{{ $countries-> country_ISO}}" data-ID="{{ $countries-> id }}" selected>{{ $countries -> country_name }}</option>
                        @else
                        <option value="{{ $countries-> country_name }}" data-ISO="{{ $countries-> country_ISO}}" data-ID="{{ $countries-> id }}">{{ $countries -> country_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input class="form-control" type="file" id="formFile" name="image">
            </div>

            <div class="input-group mb-3 d-none">
                <span class="input-group-text" id="inputGroup-sizing-default">Country ISO</span>
                <input id="country_ISO" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_ISO" value="">
            </div>

            <div class="input-group mb-3 d-none">
                <span class="input-group-text" id="inputGroup-sizing-default">Country ID</span>
                <input id="country_id"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_id" value="">
            </div>

            <div class="mb-3">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="latitude-span">location Latitude</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="latitude-span" name="latitude" id="latitude" readonly value="{{ $airportCon-> latitude }}">
                    <span class="input-group-text" id="longitude-span">location Longitude</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="longitude-span" name="longitude" id="longitude" readonly value="{{ $airportCon-> longitude }}">
                </div>

                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="input-group mb-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>

    </div>
    <script>
        const latitude = document.getElementById('latitude');
        const longitude = document.getElementById('longitude');
        mapboxgl.accessToken ='pk.eyJ1IjoidGl0YXNueGx0IiwiYSI6ImNqZWs3ZHliejBjOWMzM284aG1nbG1yN3IifQ._nFPiSI4HSaZriIEDwRa8g';

        let map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            doubleClickZoom: false,
            center: [`${longitude.value}`, `${latitude.value}`],
            zoom: 7,
        });


        map.addControl(
            new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
            })
        );

        let marker = new mapboxgl.Marker()
        .setLngLat([`${longitude.value}`, `${latitude.value}`])
        .addTo(map);

        map.on('dblclick', (e) => {
            marker.setLngLat(e.lngLat);
            latitude.value = `${e.lngLat.lat}`;
            longitude.value = `${e.lngLat.lng}`;
        })
    </script>
    <script type="text/javascript">
        const countryselect = document.getElementById('country');
        const countryIdInput = document.getElementById('country_id');
        const countryISOInput = document.getElementById('country_ISO');

        const addAttribute = function(){

            let countryID = countryselect.options[countryselect.selectedIndex].getAttribute("data-ID");
            console.log(countryID);
            countryIdInput.setAttribute("value", countryID);

            let countryISO = countryselect.options[countryselect.selectedIndex].getAttribute("data-ISO");
            console.log(countryISO);
            countryISOInput.setAttribute("value", countryISO);
        }
        addAttribute();

        countryselect.onchange = function(){
            addAttribute();
        }

    </script>


@endsection
