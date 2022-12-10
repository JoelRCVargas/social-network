<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fanpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FormFanpageController extends Controller
{

    public function index(){
        return view('admin.formFanPage');
    }
    public function fanpagelist(){
        
        return view('admin.fanpagelist');
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
    public function listFanPage(Request $request){
        return datatables()->of(
            DB::table('fanpages')
            ->where('id_user','=',Auth::id())
            ->get([
                    'id as id',
                    'name as name',
                    'cover as cover',
                    'profile as profile',
                    'description as description',
                    'address as address',
                    'website as website',
                    'email as email',
                    'link as link'
                    
                ])
        )->toJson();
    }
    public function prepareFanpageById(Request $request){
        $fanpage = DB::table('fanpages')->where('id','=',$request->id)->first();
        return json_encode($fanpage);
    }

    public function updateFanpage(Request $request){
        //return die(json_encode($request));
        /*update*/
        try{
            $fanpage = Fanpage::find($request['id']);
            $fanpage->description = $request['description'];
            $fanpage->address= $request['address'];
            $fanpage->website = $request['website'];
            $fanpage->email = $request['email'];
          
            if($request->hasFile('cover') && $request->hasFile('profile')){
                //cover
                $cover=$request->file('cover');
                $cover_name ='_'.rand().'_'.$cover->getClientOriginalName();
                //Upload file
                $cover->move(public_path('assets/fanpage'),$cover_name);
                //Delete file
                File::delete(public_path('assets/fanpage'.$fanpage->cover));
                $fanpage->cover = $cover_name;

                //profile
                $profile=$request->file('profile');
                $profile_name ='_'.rand().'_'.$profile->getClientOriginalName();
                //Upload file
                $profile->move(public_path('assets/fanpage'),$profile_name);
                //Delete file
                File::delete(public_path('assets/fanpage'.$fanpage->profile));
                $fanpage->profile = $profile_name;
            }

            if($fanpage->save()){
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

    public function getFanpage(Request $request)
    {
        return json_encode(
            DB::table('fanpages')->where('id','=', $request['id'])->first()
        );
    }

    public function deleteFanpage(Request $request){
        $fanpage = Fanpage::find($request->get('id'));
        //Delete file
        File::delete(public_path('assets/fanpage/'.$fanpage->cover));
        File::delete(public_path('assets/fanpage/'.$fanpage->profile));
        return response()->json($fanpage->delete());
    }
}
