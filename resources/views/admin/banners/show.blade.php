@extends('layouts.admin')
@section('main-content')
    <div class="card">
        <div class="card-header">
            <h1>View Your data</h1>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Heading</td>
                    <td>{{ $banners->heading }}</td>
                </tr>
                <tr>
                    <td>Paragraph</td>
                    <td>{{ $banners->para }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        @if ($banners->image)
                            <img src="/storage/{{ $banners->image }}" class="w-20" alt="">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        @if ($banners->status == '0')
                            <label value="0" selected>Inactive</label>
                        @elseif ($banners->status == '1')
                            <label value="1" selected>Active</label>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>
                        {{ $banners->updated_at }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
