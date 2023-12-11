@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <hr>
        <div class="card-heading">
            <h4 style="text-align: center" >Category Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($category as $categories)
                    <tr>
                        <td>{{$categories->id}}</td>
                        <td>{{$categories->name}}</td>
                        <td>{{$categories->desc}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/category/'.$categories->image)}}" class="w-25" alt="">
                           
                        </td>
                        <td>
                            <a  href="{{url('edit-cate/'.$categories->id)}}" class="btn btn-success" >Edit</a>
                            <a  href="{{url('delete-cate/'.$categories->id)}}" class="btn btn-danger" >delete</a>
                        </td>
                      
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection