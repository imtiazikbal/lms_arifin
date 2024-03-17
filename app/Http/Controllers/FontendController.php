<?php

namespace App\Http\Controllers;

use App\Helper\Bengali;
use App\Models\Category;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    function index(){
        $dateNew = date("d M Y");
       $date = Bengali::bn_date($dateNew); // ১০ জানুয়ারি ২০২৫
        return view('fontend.home',compact('date'));
    } 
}
