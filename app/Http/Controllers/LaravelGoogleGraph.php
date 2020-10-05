<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;


class LaravelGoogleGraph extends Controller
{
    function index()
    {

      $data = Employee::select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
       ->groupBy('gender')
       ->get();

     $array[] = ['Gender', 'Number'];
     foreach($data as $key => $value)
     {
       $array[++$key] = [$value->gender, $value->number];
     }
     return view('google_pie_chart')->with('gender', json_encode($array));
    }
}
