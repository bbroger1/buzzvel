@extends('layouts.app')
@section('title', 'Search Hotels')

@section('content')
    <div class="container">
        <div class="text-center mt-3 mb-3">
            <h3><b>Find the hotel</b></h3>
        </div>
        @include('layouts.alerts')
        <form action="{{ route('search') }}"
              method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="latitude">Latitude</label>
                <input type="text"
                       required
                       class="form-control"
                       id="latitude"
                       name="latitude"
                       placeholder="Enter the latitude (E.g.: -34.591035804444125)">
            </div>
            <div class="mb-3">
                <label for="longitude">Longitude</label>
                <input type="text"
                       required
                       class="form-control"
                       id="longitude"
                       name="longitude"
                       placeholder="Enter the longitude (E.g.: -58.42752456665039)">
            </div>
            <div class="mb-3">
                <label for="orderBy">Order by:</label>
                <select class="custom-select d-block w-100"
                        id="orderBy"
                        name="orderBy">
                    <option selected
                            value="">Choose</option>
                    <option value="distance">Distance</option>
                    <option value="price">Price</option>
                </select>
            </div>
            <button type="submit"
                    class="btn btn-primary">Search</button>
        </form>
    </div>

@endsection
