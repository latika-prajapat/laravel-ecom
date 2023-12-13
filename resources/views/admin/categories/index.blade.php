@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <hr>
        <div class="card-heading">
            <h4 style="text-align: center">Category Page</h4>
            <hr>
        </div>
        {{-- <button class="btn btn-icon btn-3 btn-primary" type="button"> --}}
        <div class="col-md-6" style="margin-left: 20px">
            <a class="btn btn-primary" href="{{ route('categories.create') }}">+Add category</a>
        </div>

        {{-- </button> --}}
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->desc }}</td>
                            <td>
                                <img src="/storage/{{ $category->image }}" class="w-20" alt="">

                            </td>
                            <td> {{ $category->updated_at }}</td>
                            <td>
                                <a href="{{ route('categories.show', ['category' => $category->id]) }}"
                                    class="btn btn-info">View</a>
                                <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                    class="btn btn-success">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
        <div class="pagi" style="margin-left: 10px;">
            {{ $categories->links() }}
        </div>

    </div>
@endsection
