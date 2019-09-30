<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use PhpParser\Node\Stmt\Class_;
use Illuminate\Support\Facades\Input;

class CustomHelper
{
    public static function cust_pagination($dataArray, $path, $query)
    {
        //hotels pagination
        $page = Input::get('page', 1); // Get the ?page=1 from the url
        $perPage = 4; // Number of items per page
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($dataArray, $offset, $perPage, true), // Only grab the items we need
            count($dataArray), // Total items
            $perPage, // Items per page
            $page, // Current page
            ['path' => $path, 'query' => $query] // We need this so we can keep all old query parameters from the url
        );
    }

    public static function custom_pagination($dataArray, $path, $query)
    {
        //hotels pagination
        $page = Input::get('page', 1); // Get the ?page=1 from the url
        $perPage = 6; // Number of items per page
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($dataArray, $offset, $perPage, true), // Only grab the items we need
            count($dataArray), // Total items
            $perPage, // Items per page
            $page, // Current page
            ['path' => $path, 'query' => $query] // We need this so we can keep all old query parameters from the url
        );
    }

    public static function prepare_programs($programs, $output)
    {
        foreach ($programs as $program)
        {
            $output[] = array(
                'id' => $program->id,
                'p_name_ar' => $program->p_name_ar,
                'p_name_en' => $program->p_name_en,
                'sub_name_ar' => $program->sub_name_ar,
                'sub_name_en' => $program->sub_name_en,
                'mekkah_ar' => $program->mekkah_ar,
                'mekkah_en' => $program->mekkah_en,
                'madenah_ar' => $program->madenah_ar,
                'madenah_en' => $program->madenah_en,
                'jeddah_ar' => $program->jeddah_ar,
                'jeddah_en' => $program->jeddah_en,
                'hotel_ar' => $program->hotel_ar,
                'hotel_en' => $program->hotel_en,
                'service_ar' => $program->service_ar,
                'service_en' => $program->service_en,
                'flight_ar' => $program->flight_ar,
                'flight_en' => $program->flight_en,
                'code'  => $program->code,
                'rate'  => $program->rate,
                'price' => $program->price,
                'image' => $program->image,
                'active' => $program->active,
            );
        }
        return $output;
    }

    public static function prepare_rooms($rooms, $output)
    {
        foreach ($rooms as $room)
        {
            $output[] = array(
                'id' => $room->id,
                'image' => $room->image,
                'price' => $room->price,
                'r_name_ar' => $room->r_name_ar,
                'r_name_en' => $room->r_name_en,
                'max'  => $room->max,
                'content_ar'  => $room->content_ar,
                'content_en'  => $room->content_en,
                'rate'  => $room->rate,
                'nights'  => $room->nights,
                'active' => $room->active,
                'hotel_id'  => $room->hotel_id,
            );
        }
        return $output;
    }

    public static function prepare_flights($flights, $output)
    {
        foreach ($flights as $flight)
        {
            $output[] = array(
                'id' => $flight->id,
                'image' => $flight->image,
                'price' => $flight->price,
                'flight_name_ar' => $flight->flight_name_ar,
                'flight_name_en' => $flight->flight_name_en,
                'duration_ar'  => $flight->duration_ar,
                'duration_en'  => $flight->duration_en,
                'code'  => $flight->code,
                'content_ar'  => $flight->content_ar,
                'content_en'  => $flight->content_en,
                'start'  => $flight->start,
                'end'  => $flight->end,
                'active' => $flight->active,
            );
        }
        return $output;
    }

    public static function prepare_services($services, $output)
    {
        foreach ($services as $service)
        {
            $output[] = array(
                'id' => $service->id,
                'name_ar' => $service->name_ar,
                'name_en' => $service->name_en,
                'content_ar' => $service->content_ar,
                'content_en' => $service->content_en,
                'place_id'  => $service->place_id,
                'price'  => $service->price,
                'rate'  => $service->rate,
                'image'  => $service->image,
                'discount'  => $service->discount,
                'active' => $service->active,
            );
        }
        return $output;
    }

    public static function prepare_hotels($hotels, $output)
    {
        foreach ($hotels as $hotel)
        {
            $output[] = array(
                'id' => $hotel->id,
                'hotel_name_ar' => $hotel->hotel_name_ar,
                'hotel_name_en' => $hotel->hotel_name_en,
                'far_ar' => $hotel->far_ar,
                'far_en' => $hotel->far_en,
                'street_ar' => $hotel->street_ar,
                'street_en' => $hotel->street_en,
                'place_id'  => $hotel->place_id,
                'best'  => $hotel->best,
                'max' => $hotel->max,
                'price'  => $hotel->price,
                'discount'  => $hotel->discount,
                'rate'  => $hotel->rate,
                'stars'  => $hotel->stars,
                'image'  => $hotel->image,
                'inner_image'  => $hotel->inner_image,
                'active' => $hotel->active,
            );
        }
        return $output;
    }

}