<?php

namespace App\Http\Controllers;

use App\Models\Fanpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $ref = DB::table('referred_users')->where('id_invited_by','=',Auth::id())->count();
        $publications = DB::table('publications')->count();
        $fanpage = DB::table('fanpages')->count();
        return view('home', ['users'=>$users,'ref'=>$ref,'publications'=>$publications,'fanpage'=>$fanpage]);
    }

    public function listUser(Request $request){
        return datatables()->of(
            DB::table('users')
            ->get([
                    'id as id',
                    'name as name',
                    'email as email',
                    'photo',
                    DB::raw('(CASE 
            WHEN users.role = "0" THEN "User" 
            WHEN users.role = "1" THEN "Admin" 
            ELSE "SuperAdmin" 
            END) AS role')
                  
      
                ])
        )->toJson();
    }

    public function listFanpage(Request $request){
        return datatables()->of(
            DB::table('fanpages') 
            ->get([
                    'id as id',
                    'cover as cover', 
                    'description as description',  
                    'website as website'                            
                ])
        )->toJson();
    }

    public function searchByLike(Request $request){
        $fanpages = Fanpage::where('name','like','%'.$request->name.'%')->get();
        return response()->json($fanpages);
    }
}
