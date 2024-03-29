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
                <tr>
                    <td>Status</td>
                    <td>
                        @if ($categories->status == '0')
                            <label value="0" selected>Inactive</label>
                        @elseif ($categories->status == '1')
                            <label value="1" selected>Active</label>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>
                        {{ $categories->updated_at }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
