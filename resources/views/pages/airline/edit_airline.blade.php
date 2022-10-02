@extends('main')
@section('content')
    <div class="container d-flex justify-content-center">
        <h1 class="mt-3">Edit an Airline</h1>
    </div>


    <div class="container border border-2 bg-dark p-2">

        <form action="/show_airline/update/{{ $airline -> id }}" method="post">

        @csrf
        @include('_partials.errors')
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Airline Name</span>
                <input required type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="airline_name" value="{{ $airline -> airline_name }}">
            </div>
            <div class="input-group mb-3">
                <select id="country" class="form-select" aria-label="Default select example" name="country_name">
                    <option selected value="" disabled>Country Selection</option>
                    @foreach ($country as $countries)
                        {{-- Adding selected tag for convenience --}}
                        @if ($countries-> country_name == $airline-> country_name)
                        <option value="{{ $countries-> country_name }}" data-ISO="{{ $countries-> country_ISO}}" data-ID="{{ $countries-> id }}" selected>{{ $countries -> country_name }}</option>
                        @else
                        <option value="{{ $countries-> country_name }}" data-ISO="{{ $countries-> country_ISO}}" data-ID="{{ $countries-> id }}">{{ $countries -> country_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3 d-none">
                <span class="input-group-text" id="inputGroup-sizing-default">Country ISO</span>
                <input id="country_ISO" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_ISO" value="">
            </div>
            <div class="input-group mb-3 d-none">
                <span class="input-group-text" id="inputGroup-sizing-default">Country ID</span>
                <input id="country_id"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="country_id" value="">
            </div>
            <div class="input-group mb-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>

    </div>
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
