<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function prepareAdminUserById(Request $request){
        $user = DB::table('users')->where('id','=', Auth::id())->first();
        return view('admin.adminuser',['user' => $user]);
    }

    public function updateAdminUser(Request $request){
        //return die(json_encode($request));
        /*update*/
        try{
            $user = User::find(Auth::id());
            $user->name = $request['name'];
            $user->email = $request['email'];
           
          
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

    public function updatePwd(Request $request){
        $user = User::find(Auth::id());
        if(Hash::check($request['old_password'],$user->password)){
            $user->password = Hash::make($request['new_password']);
            if($user->save()){
                return json_decode(true);
            }
        }else{
            return json_encode(false);
        }

    }

}