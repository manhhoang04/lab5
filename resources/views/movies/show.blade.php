<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Show Movie</title>
</head>

<body>
    <div class="container  w-50">
        <h1>Show Movie</h1>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="title"
                    value="{{ $movie->title }}" readonly>
            </div>
            <div class="mb-3">
                <label>Poster:</label>
                @if ($movie->poster)
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }} poster">
                @endif
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
                <label for="exampleInputPassword1" class="form-label">Genre</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="genre" value=" {{  $movie->genre->name  }}" readonly>
            </div>
            

            <a class="btn btn-primary" href="{{ route('movies.index') }}">Back to List</a>
        </form>
    </div>


</body>

</html>


