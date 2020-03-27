<?php

namespace App\Http\Controllers;
use App\NoteData;
use App\Notes;
use App\Units;
use App\Url;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitsController extends Controller
{

    // getting all units under a course
    public function getUnits(Request $request){

        $id = $request->route()->parameter('courseId');
        $desired_units = Units::where('courseId',$id)->get();
        return $desired_units;
    }

    public function postUnit(Request $request){
        $unit = new Units();
        $unit->user_id = Auth::id();
        $unit->name = $request->get('name');
        $unit->courseId = $request->get('courseId');

        if($unit->save()==true){
            return ([
                'message'=>"Posting Successful"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }

    }



    // getting all notes under a unit

    public function getNotes(Request $request){
        $id = $request->route()->parameter('UnitId');
        $desired_notes = Notes::where('UnitId',$id)->get();

        return $desired_notes;
    }


    public function postNotes(Request $request){
        $unit = new Notes();
        $unit->name = $request->get('name');
        $unit->user_id = Auth::id();
        $unit->UnitId = $request->get('UnitId');

        if($unit->save()==true){
            return ([
                'message'=>"Posting Successful"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }

    }

    // getting all notesData under a unit

    public function getNoteData(Request $request){
        $id = $request->route()->parameter('NoteId');
        $desired_notes = NoteData::where('NoteId',$id)->get();
        return $desired_notes;
    }

    public function postNotesData(Request $request){
        $unit = new NoteData();
        $unit->name = $request->get('name');
        $unit->file_urls1 = $request->get('file_urls1');
        $unit->file_urls2 = $request->get('file_urls2');
        $unit->user_id = Auth::id();
        $unit->file_urls3 = $request->get('file_urls3');
        $unit->NoteId = $request->get('NoteId');

        if($unit->save()==true){
            return ([
                'message'=>"Posting Successful"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }
    }

    // getting all extra notesData under a unit
    public function getNoteUrl(Request $request){
        $notes =  Url::all();
        $id = $request->route()->parameter('NoteId');
        $desired_notes = Url::where('NoteId',$id)->get();
        return $desired_notes;
    }

    public function postNotesUrl(Request $request){
        $unit = new Url();
        $unit->name = $request->get('name');
        $unit->user_id = Auth::id();
        $unit->url = $request->get('url');
        $unit->NoteId = $request->get('NoteId');

        if($unit->save()==true){
            return ([
                'message'=>"Posting Successful"]);
        }else{
            return ([
                'message'=>"An Error Occurred"]);
        }
    }

    public function getUserID(Request $request)
    {
        return (['user_id'=>Auth::id()]);
    }



    public function unitDelete(Request $request){

        $id = $request->route()->parameter('id');

        try {
            if(Units::where('id',$id)->delete()){

                Notes::where('UnitId',$id)->delete();
                NoteData::where('NoteId',$id)->delete();
                Url::where('NoteId',$id)->delete();

                return ([
                    'message'=>"Successful Delete"]);
            }else{
                return ([
                    'message'=>"An Error Occurred"]);
            }


        }catch (\Exception $e){
            return ([
                'Error'=>"Successful Delete"]);

            }

        }
    }
