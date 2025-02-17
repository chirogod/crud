<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PDO;

class NoteController extends Controller
{
    public function index(): View{
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(): View{
        return view('note.create');
    }

    public function store(Request $request): RedirectResponse{
        $note = new Note;

        $note->title = $request->title;
        $note->description = $request->description;

        $note->save();
        return redirect()->route('note.index');
    }

    public function edit($note): View{
        $note = Note::find($note);
        return view("note.edit", compact('note'));
    }

    public function update(Request $request, Note $note): RedirectResponse{ //si el parametro fuera Note $note no funcionaria, laravel no reconoce automaticamente el modelo si tiene otro nombre ya que en el enrutador le dije que recibiria {id}
        //con Note $note, nos ahorramos pasar por parametro el id y buscarlo en una linea de codigo.
        $note->update($request->all()); //con request->all nos ahorramos de como hice en create obtener cada input, pero esto solo se puede hacer cuando el name de los input es igual al de los campos de la tabla
        return redirect()->route('note.index');
    }

    public function show(Note $note): View{
        return view("note.show", compact('note'));
    }

    public function delete(Note $note): RedirectResponse{
        $note->delete();
        return redirect()->route('note.index');
    }
}
