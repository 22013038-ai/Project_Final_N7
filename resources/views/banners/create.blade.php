@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Thêm Banner</h2>

    <form action="{{ route('banners.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">
                Tiêu đề Banner
            </label>

            <input type="text"
                   name="title"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Link Banner
            </label>

            <input type="text"
                   name="link"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">
                Mô tả Banner
            </label>

            <textarea name="description"
                      class="form-control"
                      rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Chọn ảnh Banner
            </label>

            <input type="file"
                   name="image"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-success">
            Lưu Banner
        </button>

        <a href="{{ route('banners.index') }}"
           class="btn btn-secondary">
            Quay lại
        </a>

    </form>

</div>

@endsection