<!-- resources/views/movies/create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Movie</title>
</head>
<body>
    <div class="container  w-50">
        <h1>Add Movie</h1>
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Poster</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="poster">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Intro</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="intro">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="release_date">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Genre</label>
                <select name="genre_id" id="" class="form-control">
                    <option value="0" selected>Genre Movie</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" class="form-control"> {{$genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <a class="btn btn-primary" href="{{ route('movies.index')}}">Back to List</a>
            <button type="submit" class="btn btn-success">Add Movie</button>
        </form>
    </div>
    
    
</body>
</html>
