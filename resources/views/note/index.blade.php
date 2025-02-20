@extends('layouts.app')

@section('content')
<ul>
    <p><a href="{{route('note.create')}}">CREATE</a></p>
    @forelse ($notes as $note)
        <li><a href="{{ route('note.show', ['note' => $note->id]) }}">{{$note->title}}</a> <a href="{{ route('note.edit', ['note' => $note->id]) }}">EDIT</a> | <form action="{{route('note.destroy', $note->id)}}" method="POST">@csrf @method('DELETE') <input type="submit" value="DELETE"></form></li>
    @empty
        <p>Nothing to share</p>
    @endforelse
</ul>
    
@endsection