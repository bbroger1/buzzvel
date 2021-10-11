<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchHotelRequest;
use Illuminate\Support\Facades\Http;

class Search extends Controller
{
    public function __construct()
    {
        $hotels = json_decode(Http::get('https://buzzvel-interviews.s3.eu-west-1.amazonaws.com/hotels.json'), true);
        $this->hotels = $hotels;
    }

    public function getNearbyHotels(SearchHotelRequest $request)
    {
        $latidude = floatval($request['latitude']);
        $longitude = floatval($request['longitude']);
        $orderBy = $request['orderBy'];
        $hotels = $this->distance($latidude, $longitude);

        foreach ($hotels as $key => $hotel) {
            if ($orderBy == 'price') {
                $index[$key] = $hotel[3];
                $distance[$key] = $hotel[4];
            } else {
                $index[$key] = $hotel[4];
            }
        }

        if ($orderBy == 'price') {
            array_multisort($distance, SORT_ASC, $index, SORT_ASC, $hotels);
        } else {
            array_multisort($index, SORT_ASC, $hotels);
        }

        foreach ($hotels as $key => $hotel) {
            $hotels[$key][3] = number_format($hotels[$key][3], 2, ",", ".");
            $hotels[$key][4] = number_format($hotels[$key][4], 1, ",", ".");
        }

        return view('hotels_result', compact('hotels'));
    }

    public function distance($latitude, $longitude)
    {
        for ($count = 0; $count < count($this->hotels['message']); $count++) {
            $this->hotels['message'][$count][4] =
                $this->calculateDistance($latitude, $longitude, floatval($this->hotels['message'][$count][1]), floatval($this->hotels['message'][$count][2]));
        }

        return $this->hotels['message'];
    }

    public function calculateDistance($latidude, $longitude, $hotelLatitude, $hotelLongitude)
    {
        $theta = $longitude - $hotelLongitude;
        $distance = sin(deg2rad($latidude)) * sin(deg2rad($hotelLatitude)) + cos(deg2rad($latidude)) * cos(deg2rad($hotelLatitude)) * cos(deg2rad($theta));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $miles = $distance * 60 * 1.1515;
        //$km = number_format(($miles * 1.609344), 0, ',', '.');
        $km = $miles * 1.609344;
        return $km;
    }
}
