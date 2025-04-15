@extends('layouts.app')

@section('title')
    Create ToDo
@endsection

@section('container')

    <form action="store-data" method="post" class="mt-4 p-4">
        @csrf {{--what is this?--}}
        <div class="form-group m-3">
            <label for="name">ToDo Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group m-3">
            <label for="description">ToDo Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>

    </form>

@endsection