<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Danh sách phim</h1>

    <a href="{{ route('movies.create') }}" class="btn btn-success">Thêm movie</a>

    <form method="GET" action="{{ route('movies.index') }}">
        <input  style="height: 40px" type="text" name="title" placeholder="Tìm kiếm theo tiêu đề" value="{{ request('title') }}">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <table  class="table">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Thể loại</th>
                <th>Ngày phát hành</th>
                <th>Ảnh bìa</th>
                <th >Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if($movies->isEmpty())
                <tr>
                    <td colspan="6">404</td>
                </tr>
            @else
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>
                            @if($movie->poster)
                                <img src="{{ $movie->poster }}" alt="{{ $movie->title }} poster" width="50">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-warning mb-1">Xem chi tiết</a>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning mb-1">Chỉnh sửa</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn chắc chưa?')" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
{{-- 
    {{ $movies->links() }}  --}}

</body>
</html>
