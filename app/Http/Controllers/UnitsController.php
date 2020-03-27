<?php

namespace App\Http\Controllers;
use App\NoteData;
use App\Notes;
use App\Units;
use App\Url;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function getUnits(Request $request){

        $units = Units::all();
        $desired_units = $units->filter(function ($item) use ($request) {
            $id = $request->route()->parameter('courseId');
            return $item->courseId = $id;
        });
        return $desired_units;
    }

    public function getNotes(Request $request){
        $notes =  Notes::all();
        $desired_notes = $notes->filter(function ($item) use ($request) {
            $id = $request->route()->parameter('UnitId');
            return $item->courseId = $id;
        });

        return $desired_notes;
    }

    public function getNoteData(Request $request){
        $notes =  NoteData::all();
        $desired_notes = $notes->filter(function ($item) use ($request) {
            $id = $request->route()->parameter('NoteId');
            return $item->courseId = $id;
        });

        return $desired_notes;
    }

    public function getNoteUrl(Request $request){
        $notes =  Url::all();
        $desired_notes = $notes->filter(function ($item) use ($request) {
            $id = $request->route()->parameter('NoteId');
            return $item->courseId = $id;
        });

        return $desired_notes;
    }
}
