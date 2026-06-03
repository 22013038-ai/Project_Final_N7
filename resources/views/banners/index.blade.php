@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quản lý Banner</h2>

    <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">
        Thêm Banner
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>

                <td>
                    <img src="{{ asset('banners/'.$banner->image) }}"
                         width="200">
                </td>

                <td>
                    <form action="{{ route('banners.destroy',$banner->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">
                            Xóa
                        </button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection