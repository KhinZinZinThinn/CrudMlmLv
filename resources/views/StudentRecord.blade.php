@extends('layouts.app')
@section('title')StudentRecord
    @stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-success"> Student Informations</div>
                <div class="card-body bg-light">
                    <table class="table table-dark">
                        <tr>
                            <td>No</td>
                            <td>Student Name</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Phone</td>
                            <td>Photo</td>
                            <td>Actions</td>
                        </tr>

                        @foreach($stus as $stu)
                            <tr>
                                <td>{{$stu->id}}</td>
                                <td>{{$stu->stu_name}}</td>
                                <td>{{$stu->email}}</td>
                                <td>{{$stu->address}}</td>
                                <td>{{$stu->phone}}</td>
                                <td> <img src="{{route('photo.image',['img_name'=>$stu->photo])}}" class="img-thumbnail" style="width:70px; height: 70px"> </td>
                                <td>
                                    <a href="{{route('edit.student',['id'=>$stu->id])}}">Edit</a>
                                    <a href="{{route('delete.student',['id'=>$stu->id])}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            @if(session('info')) <div class="alert alert-success">{{session('info')}} </div> @endif
            <div class="card shadow-lg">
                <div class="card-header bg-primary">Insert Student Info</div>
                <div class="card-body bg-info">
                    <form enctype="multipart/form-data" method="post" action="{{route('new.student')}}" >
                        <div class="form-group">
                            <label for="stu_name">Student Name</label>
                            <input type="text" id="stu_name" name="stu_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="number" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="photo">Choose Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @stop