<!DOCTYPE html>
<html>

<head>

    <title>Sửa sự kiện</title>

</head>

<body>

<h1>Sửa sự kiện</h1>

<form
action="{{ route('events.update',$event->id) }}"
method="POST"
enctype="multipart/form-data">

    @csrf

    @method('PUT')

    <label>Loại sự kiện</label>

    <br>

    <select name="category_id">

        @foreach($categories as $category)

            <option
            value="{{ $category->id }}"

            @if($event->category_id == $category->id)

                selected

            @endif
            >

                {{ $category->name }}

            </option>

        @endforeach

    </select>

    <br><br>

    <label>Tên sự kiện</label>

    <br>

    <input
    type="text"
    name="title"
    value="{{ $event->title }}">

    <br><br>

    <label>Địa điểm</label>

    <br>

    <input
    type="text"
    name="location"
    value="{{ $event->location }}">

    <br><br>

    <label>Ngày tổ chức</label>

    <br>

    <input
    type="date"
    name="event_date"
    value="{{ $event->event_date }}">

    <br><br>

    <label>Mô tả</label>

    <br>

    <textarea
    name="description"
    rows="5"
    cols="50">{{ $event->description }}</textarea>

    <br><br>

    @if($event->image)

        <img
        src="{{ asset('uploads/'.$event->image) }}"
        width="200">

    @endif

    <br><br>

    <input
    type="file"
    name="image">

    <br><br>

    <button type="submit">

        Cập nhật

    </button>

</form>

</body>
</html>