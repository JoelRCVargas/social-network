<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fanpage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ReferredUser;

class FanpageController extends Controller
{
    public function index($id){
        $follower = 1;
        $fanpage = DB::table('fanpages')->where('id','=',$id)->select('name','cover','profile','description','address','website','email','token','id_user')->get();
        $referral = DB::table('referred_users')->where('id_user','=', Auth::id())->where('referral_token','=',$fanpage[0]->token)->first();
        if($referral == null){
            $follower = 0;
        }
        return view('admin.fanpage',['fanpage' => $fanpage[0],'follower' => $follower]);
    }

    public function registerReferredUsers(Request $request){
        ReferredUser::create([
            'referral_token' => $request->token,
            'id_referred_user' => $request->id_referred_user,
            'id_user' => Auth::id(),
            'id_invited_by' => $request->id_referred_user
        ]);
    }

    public function removeReferredUsersByIdAndToken(Request $request){
        DB::table('referred_users')->where('id_user','=', Auth::id())->where('referral_token','=',$request->token)->delete();;
    }

}
