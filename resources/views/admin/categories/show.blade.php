@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>View Your data</h1>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td>{{ $categories->name }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $categories->desc }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        @if ($categories->image)
                            <img src="/storage/{{ $categories->image }}" class="w-20" alt="">
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
