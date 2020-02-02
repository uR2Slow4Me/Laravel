@extends('layouts.app')

@section('title', 'Create a category')

@section('menuItem', 'categories')

@section('content')
    <form method="post" action="/categories">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger col-md-4 ml-4 mt-3">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item-danger ml-1 mb-1" style="background: none">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-2 ml-2 mt-3">
            <div class="form-group">
            <label for="name">Name</label>

            <input type="text" class="form-control {{$errors->has('name') ? 'border-danger' : ''}}" name="name" placeholder="Name" value = "{{old('name')}}" required>
            </div>
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
@endsection