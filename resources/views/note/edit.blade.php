@extends('layouts.app')

@section('content')
    <p><a href="{{route('note.index')}}">BACK</a></p>
    <form action="{{route('note.update', $note->id)}}" method="POST">
        @method("PUT")
        @csrf
        <label for="">Title</label>
        <input type="text" name="title" value="{{$note->title}}">
        @error('title')
            <p style="color:red;">
                {{ $message }}
            </p>
        @enderror
        <label for="">Description</label>
        <input type="text" name="description" value="{{$note->description}}">
        @error('description')
            <p style="color:red;">
                {{ $message }}
            </p>
        @enderror
        <input type="submit" value="Update">
        
    </form>
@endsection