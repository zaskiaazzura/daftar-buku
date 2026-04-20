<h1>Edit Buku</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <input type="text" name="title" value="{{ $book->title ?? $book->title }}" placeholder="Title"><br>

    <input type="text" name="author" value="{{ $book->author }}" placeholder="Author"><br>
    <input type="text" name="genre" value="{{ $book->genre }}" placeholder="Genre"><br>
    <input type="number" name="pages" value="{{ $book->pages }}" placeholder="Pages"><br>
    @if($book->cover)
        <img src="{{ asset('cover/'.$book->cover) }}" width="100"><br>
    @endif

    <input type="file" name="cover"><br>

    <select name="status">
        <option value="want_to_read" {{ $book->status == 'want_to_read' ? 'selected' : '' }}>Want to Read</option>
        <option value="currently_reading" {{ $book->status == 'currently_reading' ? 'selected' : '' }}>Currently Reading</option>
        <option value="finished" {{ $book->status == 'finished' ? 'selected' : '' }}>Finished</option>
    </select><br>
    <label>Started At:</label><br>
    <input type="date" name="started_at" value="{{ $book->started_at }}"><br>

    <label>Finished At:</label><br>
    <input type="date" name="finished_at" value="{{ $book->finished_at }}"><br>

 
    <input type="number" name="rating" value="{{ $book->rating }}" min="1" max="5" placeholder="Rating"><br>

    <button type="submit">Update</button>
</form>