<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
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

    public function store(NoteRequest $request): RedirectResponse{
        $note = new Note;
        /* PODEMOS VALIDAR LAS REQUEST DE ESTA MANERA. PERO ES MEJOR CREAR UN NoteRequest para que se encargue de esto. y en el parametro de la funcion indicamos q esperaremos la request que creamos nosotros en NoteRequest
        $request->validate([
            'title'=>'required|max:255|min:3',
            'description'=>"required|max:255|min:3"
        ]);
        */
        $note->title = $request->title;
        $note->description = $request->description;
        

        $note->save();
        return redirect()->route('note.index')->with('success', 'Note created');
        //with es para pasarle el mensaje cuando redirija a la vista.
    }

    public function edit($note): View{
        $note = Note::find($note);
        return view("note.edit", compact('note'));
    }

    public function update(NoteRequest $request, Note $note): RedirectResponse{ //si el parametro fuera Note $note no funcionaria, laravel no reconoce automaticamente el modelo si tiene otro nombre ya que en el enrutador le dije que recibiria {id}
        //con Note $note, nos ahorramos pasar por parametro el id y buscarlo en una linea de codigo.
        $note->update($request->all()); //con request->all nos ahorramos de como hice en create obtener cada input, pero esto solo se puede hacer cuando el name de los input es igual al de los campos de la tabla
        return redirect()->route('note.index')->with('success', 'Note updated');
        //with es para pasarle el mensaje cuando redirija a la vista.
    }

    public function show(Note $note): View{
        return view("note.show", compact('note'));
    }

    public function destroy(Note $note): RedirectResponse{
        $note->delete();
        return redirect()->route('note.index')->with('danger', 'Note destroyed');
    }
}
