@extends('layouts.app')

@section('content')
    <div class="mt-3 ml-2">
        <a class="col-md-4" href="/products/create">Create</a>
        @if($products->count())
            <div class="row ml-4">
                @foreach($products as $product)
                    <div class="col-lg-2 mt-4 ml-2">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><a href="/products/{{$product->id}}"> {{$product->name}} </a></h3>
                                <p class="card-text">Description: {{$product->description}}</p>
                                <p class="card-text">Category: {{$product->category->name}}</p>
                                <div class="row">
                                    <a class="btn btn-primary ml-3" href="/products/{{$product->id}}/edit">Edit</a>
                                    <form method="post" action="products/{{$product->id}}">
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
                There are no products, but you can create a new one.
            </div>
    </div>
    @endif

@endsection