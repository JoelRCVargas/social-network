<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        return view('admin.publication',['id_fanpage'=> $id]);
    }

    public function listPublications(Request $request){
       
        return datatables()->of(
            DB::table('publications')
            ->where('id_fanpage','=', $request->id)
            ->get([
                    'id as id',
                    'image as image',         
                    'description as description'
                ])
        )->toJson();

    }
    public function preparePublicationById(Request $request){
        $publication = DB::table('publications')->where('id','=',$request->id)->first();
        return json_encode($publication);
    }

    public function updatePublication(Request $request){
        //return die(json_encode($request));
        /*update*/
        try{
            $publication = Publication::find($request['id']);
            $publication->description = $request['description'];
           
          
            if($request->hasFile('image')){
                //cover
                $image=$request->file('image');
                $image_name ='_'.rand().'_'.$cover->getClientOriginalName();
                //Upload file
                $image->move(public_path('assets/publication'),$image_name);
                //Delete file
                File::delete(public_path('assets/publication'.$publication->image));
                $publication->image = $image_name;
            }

            if($publication->save()){
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

    public function createPublication(Request $request){
        /*Insert*/
        $photo=$request->file('photo');
        $photoname = "";
        if($request->hasFile('photo')){
            $photoname = '_'.rand().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('assets/publication'), $photoname);
        }
        $form_data=array(
            'title' => "Title example",
            'description'=>$request->description,             
            'image'=>$photoname,
            'time' => "-",
            'id_fanpage' => $request->id_fanpage
        ); 
        Publication::create($form_data);
        return response()->json(['success'=>'Data Added successfully.']);
    }

    public function getPublication(Request $request)
    {
        return json_encode(
            DB::table('publications')->where('id','=', $request['id'])->first()
        );
    }

    public function deletePublication(Request $request){
        $publication = Publication::find($request->get('id'));
        //Delete file
        File::delete(public_path('assets/publication/'.$publication->image));
       
        return response()->json($publication->delete());
    }

}
