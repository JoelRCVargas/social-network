<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralLinkController extends Controller
{
    public function index(){
        return view('referrals.link');
    }
}
