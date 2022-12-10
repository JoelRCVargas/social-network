<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fanpage;
use App\Models\Publication;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ReferredUser;

class FanpageController extends Controller
{
    public function index($id){
        $follower = 1;
        $fanpage = DB::table('fanpages')->where('id','=',$id)->select('name','cover','profile','description','address','website','email','token','id_user')->get();
        $referral = DB::table('referred_users')->where('id_user','=', Auth::id())->where('referral_token','=',$fanpage[0]->token)->first();
        $publications = Publication::where('id_fanpage','=',$id)->get();
        //dd($publications3);
        if($referral == null){
            $follower = 0;
        }
        return view('admin.fanpage',['fanpage' => $fanpage[0],'follower' => $follower,'publications' => $publications]);
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

    public function registerCommentByPublication(Request $request){
        $comment = Comment::create([
            'publication_id' => $request->publication_id,
            'id_user' => $request->id_user,
            'description' => $request->description
        ]);
        return response()->json($comment);
    }
    public function deleteComment(Request $request){
        $comment = Comment::find($request->get('id'));
        return response()->json($comment->delete());
    }
    public function updateComment(Request $request){
        $comment = Comment::find($request['id']);
        $comment->description = $request['description'];
        if($comment->save()){
            return json_encode(true);
        }
    }
    public function registerLike(Request $request){
        $likebyuser = Like::where('user_id','=',Auth::id())->where('publication_id','=',$request->publication_id)->first();
        if($likebyuser == null){
            $like = Like::create([
                'user_id' => Auth::id(),
                'publication_id' => $request->publication_id
            ]);
            return json_encode(true);
        }
        $likebyuser->delete();
        return json_encode(false);
    }
    public function deleteLike(Request $request){
        
    }
}
