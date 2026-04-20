<h1>Tambah Buku</h1>

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="tittle" placeholder="Title"><br>
    <input type="text" name="author" placeholder="Author"><br>
    <input type="text" name="genre" placeholder="Genre"><br>
    <input type="number" name="pages" placeholder="Pages"><br>

    <input type="file" name="cover"><br>

    <select name="status">
        <option value="want_to_read">Want to Read</option>
        <option value="currently_reading">Currently Reading</option>
        <option value="finished">Finished</option>
    </select><br>
    <input type="date" name="started_at"><br>
    <input type="date" name="finished_at"><br>
    <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5"><br>

    <button type="submit">Simpan</button>
</form>