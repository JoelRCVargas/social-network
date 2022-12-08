<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserFanPageListController extends Controller
{
    public function index(){
        return view('user.fanpagelist');
    }

    public function listFanpagesByReferral(Request $request){
        return datatables()->of(
            $test = DB::table('fanpages')
            ->join('referred_users','fanpages.token','=', 'referred_users.referral_token')
            ->where('referred_users.id_user','=', Auth::id())->get([
                'fanpages.id as id_fanpage',
                'fanpages.profile as profile',
                'fanpages.name as name',
                'fanpages.description as description',
                'fanpages.token as token',
                'fanpages.id_user as id_user',
                'fanpages.link as link'
            ])
        )->toJson();
    }
}
