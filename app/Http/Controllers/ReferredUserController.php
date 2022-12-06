<?php

namespace App\Http\Controllers;

use App\Models\ReferredUser;
use App\Http\Requests\StoreReferredUserRequest;
use App\Http\Requests\UpdateReferredUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ReferredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('referrals.list');
    }

    public function listReferrals(Request $request){
        return datatables()->of(
            DB::table('referred_users')
            ->join('users','referred_users.id_user','=', 'users.id')
            ->where('referred_users.referral_token','=',Auth::user()->token)->get([
                    'users.name as name',
                    'users.email as email',
                    'users.token as token',
                    'referred_users.id'
                ])
        )->toJson();
    }
}
