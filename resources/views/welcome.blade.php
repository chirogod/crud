@extends('layouts.app')

@section('content')
    <h1>Welcome to the CRUD</h1>
    <h2>In this crud you will be able to create, read, update and delete notes. Thanks for watching.</h2>
    <p>Acces to the notes: <a href="{{ route('note.index') }}">NOTES</a></p>
@endsection