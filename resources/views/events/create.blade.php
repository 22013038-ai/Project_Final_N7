<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Thêm sự kiện</title>

    <style>

        body{

            font-family: Arial, sans-serif;

            background:#f4f4f4;

            padding:40px;

        }

        .container{

            width:600px;

            margin:auto;

            background:white;

            padding:30px;

            border-radius:10px;

            box-shadow:0 0 10px rgba(0,0,0,0.1);

        }

        h1{

            text-align:center;

            margin-bottom:30px;

        }

        label{

            font-weight:bold;

        }

        input,
        textarea,
        select{

            width:100%;

            padding:10px;

            margin-top:8px;

            margin-bottom:20px;

            border:1px solid #ccc;

            border-radius:5px;

        }

        button{

            background:#0d6efd;

            color:white;

            border:none;

            padding:12px 20px;

            border-radius:5px;

            cursor:pointer;

            font-size:16px;

        }

        button:hover{

            background:#0b5ed7;

        }

        .error{

            color:red;

            margin-bottom:15px;

        }

        .back{

            display:inline-block;

            margin-bottom:20px;

            text-decoration:none;

            color:#0d6efd;

        }

    </style>

</head>

<body>

<div class="container">

    <a href="/" class="back">
        ← Quay lại trang chủ
    </a>

    <h1>🎉 Thêm sự kiện</h1>

    @if ($errors->any())

        <div class="error">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form
    action="{{ route('events.store') }}"
    method="POST"
    enctype="multipart/form-data">

        @csrf

        <label>Loại sự kiện</label>

        <select name="category_id">

            @foreach($categories as $category)

                <option value="{{ $category->id }}">

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        <label>Tên sự kiện</label>

        <input
        type="text"
        name="title"
        placeholder="Nhập tên sự kiện"
        value="{{ old('title') }}">

        <label>Địa điểm</label>

        <input
        type="text"
        name="location"
        placeholder="Nhập địa điểm"
        value="{{ old('location') }}">

        <label>Ngày tổ chức</label>

        <input
        type="date"
        name="event_date"
        value="{{ old('event_date') }}">

        <label>Mô tả sự kiện</label>

        <textarea
        name="description"
        rows="5"
        placeholder="Nhập mô tả sự kiện">{{ old('description') }}</textarea>

        <label>Ảnh sự kiện</label>

        <input
        type="file"
        name="image">

        <button type="submit">

            ➕ Thêm sự kiện

        </button>

    </form>

</div>

</body>

</html>