<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::view("/", 'welcome')->name('welcome');
Route::get("/note", [NoteController::class,'index'])->name('note.index');
Route::get("/note/create", [NoteController::class,'create'])->name('note.create');
Route::post("/note/store", [NoteController::class, 'store'])->name('note.store');
Route::get("/note/edit/{id}", [NoteController::class, 'edit'])->name('note.edit');