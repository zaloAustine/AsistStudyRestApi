<?php

namespace App\Http\Controllers;

use App\comment;
use App\NoteData;
use Illuminate\Http\Request;
use App\post;

class BlogController extends Controller
{


    public function post(Request $request){
        $post = new post();
        $post ->user_id = Auth::id();
        $post ->Title = $request->get('Title');
        $post->Description = $request->get('Description');
        $post->image_urls = $request->get('image_urls');

        if($post ->save()==true){
            return ([
                'message'=>"Posting Successful"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }

    }

    public function getAllPosts(){

        return post::all();
    }

    public function getUserPosts(Request $request){
        $id = $request->route()->parameter('user_id');
        $userposts = post::where('user_id',$id)->get();
        return $userposts;
    }


    public function deletepost(Request $request){
        $id = $request->route()->parameter('id');

        if(post::where('id',$id)->delete()){
            comment::where('post_id',$id)->delete();
            return ([
                'message'=>"Successful Delete"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }
    }





    public function comment(Request $request){
        $comment = new comment();
        $comment ->user_id = Auth::id();
        $comment->comment = $request->get('comment');
        $comment->post_id = $request->get('post_id');


        if($comment ->save()==true){
            return ([
                'message'=>"Posting Successful"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }

    }

    public function getAllComments(Request $request){

        $id = $request->route()->parameter('post_id');
        $userposts = comment::where('post_id',$id)->get();
        return $userposts;
    }

    public function getUserComments(Request $request){
        $id = $request->route()->parameter('user_id');
        $userposts = comment::where('user_id',$id)->get();
        return $userposts;
    }

    public function deletecomment(Request $request){
        $id = $request->route()->parameter('user_id');

        if(comment::where('user_id',$id)->delete()){
            return ([
                'message'=>"Successful Delete"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }
    }
}
