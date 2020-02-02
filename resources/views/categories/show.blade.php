@extends('layouts.app')

@section('title', 'Details')

@section('menuItem', 'categories')

@section('content')
    <div class="card-body">
        <h5 class="card-title">{{$category->name}}</h5>
    </div>

    <div class="ml-3">
        <a href="/categories/{{$category->id}}">Create a category</a>
    </div>
@endsection