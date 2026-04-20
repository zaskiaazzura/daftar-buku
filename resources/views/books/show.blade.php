<h1>Detail Buku</h1>

<p><b>Title:</b> {{ $book->title ?? $book->title }}</p>
<p><b>Author:</b> {{ $book->author }}</p>
<p><b>Genre:</b> {{ $book->genre }}</p>
<p><b>Pages:</b> {{ $book->pages }}</p>
@if($book->cover)
    <p><b>Cover:</b></p>
    <img src="{{ asset('cover/'.$book->cover) }}" width="150"><br>
@endif
<p><b>Status:</b> {{ $book->status }}</p>
<p><b>Tanggal Mulai:</b> {{ $book->started_at ?? '-' }}</p>
<p><b>Tanggal Selesai:</b> {{ $book->finished_at ?? '-' }}</p>
<p><b>Rating:</b> {{ $book->rating ?? '-' }}</p>
<br>
<a href="{{ route('books.index') }}">Kembali</a>