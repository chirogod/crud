@extends('layouts.app')

@section('content')
    <a href="{{ route('note.index') }}">BACK</a>
    <h1>{{  $note->title }}</h1>
    <h2>{{  $note->description }}</h2>
@endsection