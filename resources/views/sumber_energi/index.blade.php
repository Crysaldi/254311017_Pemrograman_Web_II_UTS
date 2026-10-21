
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Sumber Energi - SDG7 Learn</title>
</head>
<body>
    <h1>Data Sumber Energi</h1>
    <p>Pengelolaan data energi terbarukan — SDG 7</p>

    @if (session('success'))
        <div class="message">{{ session('success') }}</div>
    @endif

    <a class="add" href="{{ route('sumber-energi.create') }}">+ Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Energi</th>
                <th>Jenis</th>
                <th>Kapasitas</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sumberEnergi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_energi }}</td>
                    <td>{{ $item->jenis_energi }}</td>
                    <td>{{ number_format($item->kapasitas, 2, ',', '.') }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        @if ($item->status_aktif)
                            Aktif
                        @else
                            Tidak Aktif
                        @endif
                    </td>
                    <td>
                        <a class="edit"
                           href="{{ route('sumber-energi.edit', $item) }}">Edit</a>

                        <form action="{{ route('sumber-energi.destroy', $item) }}"
                              method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="delete" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data sumber energi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
