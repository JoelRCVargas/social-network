<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fanpage;

class FanpageController extends Controller
{
    //

public function index(){
    return view('admin.fanpage');
}

}
