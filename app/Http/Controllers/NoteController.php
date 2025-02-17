<?php

namespace App\Http\Controllers;
use App\Models\Note;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(){
        return view('note.create');
    }

    public function store(Request $request){
        $note = new Note;

        $note->title = $request->title;
        $note->description = $request->description;

        $note->save();
        return redirect()->route('note.index');
    }

    public function edit($id){
        $note = Note::find($id);
        return view("note.edit", compact('note'));
    }
}
