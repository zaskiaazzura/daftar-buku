<h1>Data Buku</h1>

<a href="{{ route('books.create') }}">Tambah Buku</a>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Pages</th>
        <th>Cover</th>
        <th>Status</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Rating</th>
        <th>Aksi</th>
    </tr>

    @foreach($books as $b)
    <tr>
        <td>{{ $b->tittle ?? $b->title }}</td>

        <td>{{ $b->author }}</td>
        <td>{{ $b->genre }}</td>
        <td>{{ $b->pages }}</td>
        <td>
            @if($b->cover)
                <img src="{{ asset('cover/'.$b->cover) }}" width="100">
            @else
                Tidak ada
            @endif
        </td>
        <td>{{ $b->status }}</td>
        <td>{{ $b->started_at }}</td>
        <td>{{ $b->finished_at }}</td>
        <td>{{ $b->rating }}</td>
        <td>
            <a href="{{ route('books.show', $b->id) }}">Detail</a>
            <a href="{{ route('books.edit', $b->id) }}">Edit</a>
            <form action="{{ route('books.destroy', $b->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>