<?php

namespace App\Http\Controllers;

use App\Models\ReferredUser;
use App\Http\Requests\StoreReferredUserRequest;
use App\Http\Requests\UpdateReferredUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ReferredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $fanpages = DB::table('fanpages')->where('id_user','=',Auth::id())->select('token','id')->get();
        // $inArray = [];
        // foreach ($fanpages as $token){ 
        //     $referred_users = DB::table('referred_users')->where('referral_token','=', $token->token)->get();
        //     $inArray = Arr::add($inArray, 'referred', $referred_users);
        // }
        // dd($inArray);
        //dd(json_encode($inArray));
        return view('referrals.list');
    }

    public function listReferrals(Request $request){
        return datatables()->of(
            DB::table('referred_users')
            ->join('users','referred_users.id_user','=', 'users.id')
            ->where('referred_users.id_referred_user','=', Auth::id())
            ->orWhere('referred_users.id_invited_by','=', Auth::id())->get([
                    'users.name as name',
                    'users.email as email',
                    'users.token as token',
                    'referred_users.id'
                ])
        )->toJson();
    }
}
