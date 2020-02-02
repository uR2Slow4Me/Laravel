@extends('layouts.app')

@section('content')
    <div class="mt-3 ml-2">
<a class="col-md-4" href="/categories/create">Create</a>
@if($categories->count())
<div class="row ml-4">
@foreach($categories as $category)
                <div class="col-lg-2 mt-4 ml-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/categories/{{$category->id}}"> {{$category->name}} </a></h5>
                            <p class="card-text">Продукти от тази категория: {{$category->name}}</p>
                            <div class="row">
                            <a class="btn btn-primary ml-3" href="/categories/{{$category->id}}/edit">Edit</a>
                            <form method="post" action="categories/{{$category->id}}">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-danger ml-2" type="submit">Delete</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
</div>
    @else
    <div class="col-md-4">
        There are no car brands, but you can create a new one.
    </div>
    </div>
@endif

@endsection