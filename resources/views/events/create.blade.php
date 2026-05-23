@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-blue-700 px-8 py-6">

            <h1 class="text-3xl font-bold text-white">

                Thêm Sự Kiện Mới

            </h1>

            <p class="text-blue-100 mt-2">

                Nhập thông tin để tạo sự kiện mới trong hệ thống

            </p>

        </div>

        {{-- CONTENT --}}
        <div class="p-8">

            {{-- ERROR --}}
            @if ($errors->any())

                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                            <li>

                                {{ $error }}

                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- FORM --}}
            <form
                action="{{ route('events.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                {{-- CATEGORY --}}
                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Danh mục sự kiện

                    </label>

                    <select
                        name="category_id"
                        required
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        <option value="">

                            Chọn danh mục

                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- TITLE --}}
                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Tên sự kiện

                    </label>

                    <input
                        type="text"
                        name="title"
                        required
                        placeholder="Nhập tên sự kiện"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- LOCATION --}}
                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Tỉnh / Thành phố

                    </label>

                    <select
                        name="location"
                        required
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        <option value="">

                            Chọn địa phương

                        </option>

                        <option>Hà Nội</option>
                        <option>Hải Phòng</option>
                        <option>Quảng Ninh</option>
                        <option>Lạng Sơn</option>
                        <option>Cao Bằng</option>
                        <option>Thái Nguyên</option>
                        <option>Tuyên Quang</option>
                        <option>Lào Cai</option>
                        <option>Lai Châu</option>
                        <option>Điện Biên</option>
                        <option>Sơn La</option>
                        <option>Phú Thọ</option>
                        <option>Bắc Ninh</option>
                        <option>Hưng Yên</option>
                        <option>Ninh Bình</option>
                        <option>Thanh Hóa</option>
                        <option>Nghệ An</option>
                        <option>Hà Tĩnh</option>
                        <option>Quảng Trị</option>
                        <option>Huế</option>
                        <option>Đà Nẵng</option>
                        <option>Quảng Ngãi</option>
                        <option>Gia Lai</option>
                        <option>Khánh Hòa</option>
                        <option>Đắk Lắk</option>
                        <option>Lâm Đồng</option>
                        <option>TP Hồ Chí Minh</option>
                        <option>Đồng Nai</option>
                        <option>Tây Ninh</option>
                        <option>Đồng Tháp</option>
                        <option>Vĩnh Long</option>
                        <option>Cần Thơ</option>
                        <option>An Giang</option>
                        <option>Cà Mau</option>

                    </select>

                </div>

                {{-- LOCATION DETAIL --}}
                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Địa điểm cụ thể

                    </label>

                    <input
                        type="text"
                        name="location_detail"
                        placeholder="Ví dụ: Tràng An, Bà Nà Hills..."
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- DATE --}}
                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Ngày tổ chức

                    </label>

                    <input
                        type="date"
                        name="event_date"
                        required
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Mô tả sự kiện

                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        required
                        placeholder="Nhập mô tả chi tiết sự kiện"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>

                </div>

                {{-- IMAGES --}}
                <div class="mb-8">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Hình ảnh sự kiện

                    </label>

                    <input
                        type="file"
                        name="images[]"
                        id="imageInput"
                        multiple
                        class="w-full border border-gray-300 rounded-lg p-3">

                    <p class="text-sm text-gray-500 mt-2">

                        Có thể chọn nhiều ảnh

                    </p>

                    {{-- PREVIEW --}}
                    <div
                        id="previewContainer"
                        class="mt-5 flex gap-4 flex-wrap">

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex gap-4">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">

                        Lưu sự kiện

                    </button>

                    <a
                        href="/events"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-3 rounded-lg font-semibold">

                        Quay lại

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

{{-- PREVIEW SCRIPT --}}
<script>

document
.getElementById('imageInput')
.addEventListener('change', function(e){

    const previewContainer =
    document.getElementById('previewContainer');

    previewContainer.innerHTML = '';

    const files = e.target.files;

    for(let i = 0; i < files.length; i++){

        const img =
        document.createElement('img');

        img.src =
        URL.createObjectURL(files[i]);

        img.className =
        'max-h-40 rounded-lg shadow-md';

        previewContainer.appendChild(img);

    }

});

</script>

@endsection