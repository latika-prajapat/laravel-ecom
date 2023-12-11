@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>Add Category</h1>
        </div>
        <div class="card-body">
          <form action="{{url('store-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name"  id="">
                   
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                      <textarea name="desc" id="" cols="30"  rows="10"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image"  id="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">status</label>
                        <input type="checkbox" name="status"  id="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
             
            </div>
          </form>
        </div>
    </div>
@endsection