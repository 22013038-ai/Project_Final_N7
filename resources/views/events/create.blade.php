@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="bg-blue-700 px-8 py-6">

            <h1 class="text-3xl font-bold text-white">

                Thêm Sự Kiện Mới

            </h1>

            <p class="text-blue-100 mt-2">

                Nhập thông tin để tạo sự kiện mới trong hệ thống

            </p>

        </div>

        <div class="p-8">

            <form
                action="{{ route('events.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Danh mục sự kiện

                    </label>

                    <select
                        name="category_id"
                        required
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

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

                <div class="mb-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Địa điểm cụ thể

                    </label>

                    <input
                        type="text"
                        name="location_detail"
                        placeholder="Ví dụ: Tràng An, Bà Nà Hills, Hồ Xuân Hương..."
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                </div>


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


                <div class="mb-8">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Hình ảnh sự kiện

                    </label>

                    <input
                        type="file"
                        name="image"
                        id="imageInput"
                        class="w-full border border-gray-300 rounded-lg p-3">

                    <div class="mt-5">

                        <img
                            id="preview"
                            class="hidden max-h-80 rounded-lg shadow-md">

                    </div>

                </div>

                <div class="flex gap-4">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">

                        Lưu sự kiện

                    </button>

                    <a
                        href="/"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-3 rounded-lg font-semibold">

                        Quay lại

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

document
.getElementById('imageInput')
.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const preview =
        document.getElementById('preview');

        preview.src =
        URL.createObjectURL(file);

        preview.classList.remove('hidden');

    }

});

</script>

@endsection