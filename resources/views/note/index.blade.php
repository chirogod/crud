@extends('layouts.app')

@section('content')
<ul>
    <p><a href="{{route('note.create')}}">CREATE</a></p>
    @forelse ($notes as $note)
        <li><a href="{{ route('note.show', ['note' => $note->id]) }}">{{$note->title}}</a> <a href="{{ route('note.edit', ['note' => $note->id]) }}">EDIT</a> | <a href="">DELETE</a></li>
    @empty
        <p>Nothing to share</p>
    @endforelse
</ul>
    
@endsection