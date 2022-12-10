<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function index(){
        
        return view('admin.user');
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
    
  
    public function prepareUserById(Request $request){
        $user = DB::table('users')->where('id','=',$request->id)->first();
        return json_encode($user);
    }

    public function updateUser(Request $request){
        //return die(json_encode($request));
        /*update*/
        try{
            $user = User::find($request['id']);
            $user->name = $request['name'];
            $user->email= $request['email'];
            $user->role = $request['role'];
            
            if($request->hasFile('photo')){
                //cover
                $photo=$request->file('photo');
                $photo_name ='_'.rand().'_'.$photo->getClientOriginalName();
                //Upload file
                $photo->move(public_path('assets/user'),$photo_name);
                //Delete file
                File::delete(public_path('assets/user'.$user->photo));
                $user->photo = $photo_name;
            }
           

            if($user->save()){
                echo json_encode(true);
            }

        }catch (Exception $e){
            switch ($e->getCode()) {
                case '23000':
                    $rpta = 'Éste producto ya está actualizado.';
                    break;
                default:
                    $rpta = 'Ocurrio un error inesperado';
                    break;
            }
            echo $rpta;
        }
    }

    public function getUser(Request $request)
    {
        return json_encode(
            DB::table('users')->where('id','=', $request['id'])->first()
        );
    }

    public function deleteUser(Request $request){
        $user = User::find($request->get('id'));
        File::delete(public_path('assets/user/'.$user->photo));
        //Delete file
        return response()->json($user->delete());
    }
}