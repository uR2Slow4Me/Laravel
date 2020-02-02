@extends('layouts.app')

@section('title', 'Add a product')

@section('menuItem', 'product')

@section('content')
    <form method="post" action="/products">
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

                @if($categories->count())
                    <label for="category">Category</label>
                    <select id="category_select" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                @else
                    There are no categories, please create some!
                @endif
            </div>

            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script>
    $(document).ready(function () {
        $('#category_select').change(function() {
            let category_id = $('#category_select').val();

        });
        $('#category_select').trigger('change');
    });
</script>