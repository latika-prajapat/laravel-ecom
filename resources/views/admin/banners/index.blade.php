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
            <a class="btn btn-primary" href="{{ route('banners.create') }}">+Add banner</a>
        </div>
        {{-- </button> --}}
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Paragraph</th>
                    <th>Status</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>
                                <img src="/storage/{{ $banner->image }}" class="w-20" alt="">
                            </td>
                            <td>{{ $banner->heading }}</td>
                            <td>{{ $banner->para }}</td>
                            <td>
                                @if ($banner->status == 1)
                                    <label>Active</label>
                                @elseif ($banner->status == 0)
                                    <label>Inactive</label>
                                @else
                                    <label>Active</label>
                                @endif
                            </td>
                            <td> {{ $banner->updated_at}}</td>
                            <td>
                                <a href="{{ route('banners.show', ['banner' => $banner->id]) }}"
                                    class="btn btn-info">View</a>
                                <a href="{{ route('banners.edit', ['banner' => $banner->id]) }}"
                                    class="btn btn-success">Edit</a>
                                <form action="{{ route('banners.destroy', $banner->id) }}" method="POST">
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
            {{ $banners->links() }}
        </div>
    </div>
@endsection
