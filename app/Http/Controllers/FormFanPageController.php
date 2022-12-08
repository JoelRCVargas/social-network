<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fanpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FormFanpageController extends Controller
{

    public function index(){
        return view('admin.formFanPage');
    }

    public function create(Request $request){
        /*Insert*/
        $cover=$request->file('cover');
        $profile=$request->file('profile');

        if($request->hasFile('cover') && $request->hasFile('profile')){
            $covername = '_'.rand().'_'.$cover->getClientOriginalName();
            $cover->move(public_path('assets/fanpage'), $covername);

            $profilename = '_'.rand().'_'.$profile->getClientOriginalName();
            $profile->move(public_path('assets/fanpage'), $profilename);

            $token = Str::uuid()->toString();

            $form_data=array(
                'description' => $request->description,
                'address'=>$request->address,
                'website'=>$request->website,
                'email'=>$request->email,
                'cover'=>$covername,
                'profile' => $profilename,
                'name' => $request->name,
                'token' => $token,
                'link' => '/register/?token='.$token.'&referred='.Auth::id().'&invitedby=',
                'id_user' => Auth::id()
            ); 
        } else{
            return response()->json(['error'=>'An error occurred while entering the data.']);
        }
        Fanpage::create($form_data);
        return response()->json(['success'=>'Data Added successfully.']);
    }
}
