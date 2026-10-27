
@extends('layouts.app')

@section('title', 'Tambah Sumber Energi')

@section('content')
<div style="margin-bottom:24px;">
    <a href="{{ route('sumber-energi.index') }}" class="text-link">
        &larr; Kembali ke Sumber Energi
    </a>

    <div class="page-heading" style="margin-top:18px; margin-bottom:24px;">
        <div>
            <span class="eyebrow">DATA ENERGI</span>
            <h1>Tambah Sumber Energi</h1>
            <p>Lengkapi informasi sumber energi yang akan didaftarkan.</p>
        </div>
    </div>
</div>

<div class="auth-card" style="max-width:720px; margin:0 auto;">
    <h2>Informasi Sumber Energi</h2>
    <p>Isi semua kolom dengan data yang sesuai.</p>

    @if ($errors->any())
        <div class="form-alert" style="margin-bottom:20px;">
            Periksa kembali data yang kamu masukkan.
        </div>
    @endif

    <form action="{{ route('sumber-energi.store') }}" method="POST">
        @csrf

        @include('sumber_energi._form')

        <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:26px; flex-wrap:wrap;">
            <a href="{{ route('sumber-energi.index') }}" class="button button-quiet">
                Batal
            </a>

            <button type="submit" class="button button-primary">
                Simpan Sumber Energi
            </button>
        </div>
    </form>
</div>
@endsection
