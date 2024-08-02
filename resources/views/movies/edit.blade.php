
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit Movie</title>
</head>
<body>

    <div class="container  w-50">
        <h1>Edit Movie</h1>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="title"
                    value="{{ $movie->title }}" readonly>
            </div>
            <div class="mb-3">
                <input type="text" name="poster" value="{{ $movie->poster }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Intro</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="intro"
                    value="{{ $movie->intro }}"readonly>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Release_date</label>
                <input type="datetime" class="form-control" id="exampleInputPassword1" name="release_date"
                    value="{{ $movie->release_date }}" readonly>
            </div>
            <div class="mb-3">
                <select name="genre_id" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $genre->id == $movie->genre_id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"  class="btn btn-success">Cập nhật dữ liệu</button>
            <a class="btn btn-primary" href="{{ route('movies.index') }}">Back to List</a>
        </form>
    </div>

   
</body>
</html>
