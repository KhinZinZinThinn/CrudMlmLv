@extends('layouts.app')
@section('title')Edit Student Record
@stop
@section('content')
    <div class="col-md-8 offset-md-2">
        @if(session('info')) <div class="alert alert-success">{{session('info')}} </div> @endif
        <div class="card shadow-lg">
            <div class="card-header bg-primary">Update Info</div>
            <div class="card-body bg-info">
                <form enctype="multipart/form-data" method="post" action="{{route('update.student')}}" >
                    <input type="hidden" name="id" value="{{$stus->id}}">
                    <div class="form-group">
                        <label for="stu_name">Student Name</label>
                        <input type="text" value="{{$stus->stu_name}}" id="stu_name" name="stu_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{$stus->email}}" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control">{{$stus->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" value="{{$stus->phone}}" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="photo">Choose Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @stop