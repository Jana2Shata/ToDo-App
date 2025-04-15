@extends('layouts.app')

@section('title')
    Edit ToDo
@endsection

@section('container')

    <form action="{{ route('update', $todo->id) }}" method="post" class="mt-4 p-4">
        @csrf                                                      {{-- ^ can only accept post --}}
        @method('PUT')  {{-- tells Laravel it's a PUT request --}}

        <div class="form-group m-3">
            <label for="name">ToDo Name</label>
            <input type="text" class="form-control" name="name" value="{{$todo->name}}">
        </div>

        <div class="form-group m-3">
            <label for="description">ToDo Description</label>
            <textarea class="form-control" name="description" rows="3">{{$todo->description}}</textarea>  
            {{-- why "desc here" not like "name here"? --}}
        </div>

        <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Submit">
        </div>

    </form>

@endsection