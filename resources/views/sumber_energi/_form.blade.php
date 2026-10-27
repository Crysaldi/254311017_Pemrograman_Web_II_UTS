
@php
    $energi = $sumberEnergi ?? null;
@endphp

<div class="form-stack">
    <div class="form-field">
        <label for="nama_energi">Nama Energi</label>
        <input
            class="field"
            type="text"
            id="nama_energi"
            name="nama_energi"
            value="{{ old('nama_energi', $energi->nama_energi ?? '') }}"
            placeholder="Contoh: PLTS Atap"
            required
        >
        @error('nama_energi')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-field">
        <label for="jenis_energi">Jenis Energi</label>
        <input
            class="field"
            type="text"
            id="jenis_energi"
            name="jenis_energi"
            value="{{ old('jenis_energi', $energi->jenis_energi ?? '') }}"
            placeholder="Contoh: Energi Surya"
            required
        >
        @error('jenis_energi')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-field">
        <label for="kapasitas">Kapasitas</label>
        <input
            class="field"
            type="number"
            id="kapasitas"
            name="kapasitas"
            value="{{ old('kapasitas', $energi->kapasitas ?? '') }}"
            placeholder="Masukkan kapasitas"
            min="0"
            step="0.01"
            required
        >
        @error('kapasitas')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-field">
        <label for="lokasi">Lokasi</label>
        <input
            class="field"
            type="text"
            id="lokasi"
            name="lokasi"
            value="{{ old('lokasi', $energi->lokasi ?? '') }}"
            placeholder="Masukkan lokasi sumber energi"
            required
        >
        @error('lokasi')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-field">
        <label for="status_aktif">Status</label>
        <select class="select-field" id="status_aktif" name="status_aktif" required>
            <option value="1" @selected((string) old('status_aktif', isset($energi) ? (int) $energi->status_aktif : 1) === '1')>
                Aktif
            </option>
            <option value="0" @selected((string) old('status_aktif', isset($energi) ? (int) $energi->status_aktif : 1) === '0')>
                Tidak Aktif
            </option>
        </select>
        @error('status_aktif')
            <span class="field-error">{{ $message }}</span>
        @enderror
    </div>
</div>
