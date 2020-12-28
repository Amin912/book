@extends('layouts.admin')
   
@section('content')

<!-- resources/views/auth/register.blade.php -->
<form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Book title:
    <br />
    <input type="text" name="Title" />
    <br /><br />
    Author:
    <br />
    <input type="text" name="Author" />
    <br /><br />
    Catégorie:
    <br />
    <input type="text" name="Category" />
    <br /><br />
    Description:
    <br />
    <input type="text" name="Description" />
    <br /><br />
    Price:
    <br />
    <input type="number" name="Price" />
    <br /><br />
    Cover:
    <br />
    <input type="file" name="Cover" />
    <br /><br />
    <input type="submit" value=" Save " />
</form>
@endsection