
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Sumber Energi</title>
</head>
<body>
    <h1>Tambah Sumber Energi</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sumber-energi.store') }}" method="POST">
        @csrf

        <label>Nama Energi</label><br>
        <input type="text" name="nama_energi"
               value="{{ old('nama_energi') }}" required>
        <br><br>

        <label>Jenis Energi</label><br>
        <input type="text" name="jenis_energi"
               value="{{ old('jenis_energi') }}" required>
        <br><br>

        <label>Kapasitas</label><br>
        <input type="number" name="kapasitas" step="0.01" min="0"
               value="{{ old('kapasitas') }}" required>
        <br><br>

        <label>Lokasi</label><br>
        <input type="text" name="lokasi"
               value="{{ old('lokasi') }}" required>
        <br><br>

        <label>Status</label><br>
        <select name="status_aktif" required>
            <option value="1" {{ old('status_aktif', '1') == '1' ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ old('status_aktif') === '0' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('sumber-energi.index') }}">Kembali</a>
    </form>
</body>
</html>
