
@extends('layouts.app')

@section('title', 'Detail Sumber Energi')

@section('content')
<div style="margin-bottom:24px;">
    <a href="{{ route('sumber-energi.index') }}" class="text-link">
        &larr; Kembali ke Sumber Energi
    </a>

    <div class="page-heading" style="margin-top:18px;">
        <div>
            <span class="eyebrow">DETAIL DATA</span>
            <h1>{{ $sumberEnergi->nama_energi }}</h1>
            <p>Informasi lengkap sumber energi yang terdaftar di SDG7 Learn.</p>
        </div>

        <a href="{{ route('sumber-energi.edit', $sumberEnergi->id) }}"
           class="button button-primary">
            Edit Data
        </a>
    </div>
</div>

<div class="auth-card" style="max-width:800px; margin:0 auto;">
    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:22px;">
        <div>
            <p style="font-size:12px; color:var(--muted); margin-bottom:6px;">Nama Energi</p>
            <h3 style="color:var(--deep-green); margin:0;">
                {{ $sumberEnergi->nama_energi }}
            </h3>
        </div>

        <div>
            <p style="font-size:12px; color:var(--muted); margin-bottom:6px;">Jenis Energi</p>
            <h3 style="color:var(--deep-green); margin:0;">
                {{ $sumberEnergi->jenis_energi }}
            </h3>
        </div>

        <div>
            <p style="font-size:12px; color:var(--muted); margin-bottom:6px;">Kapasitas</p>
            <h3 style="color:var(--deep-green); margin:0;">
                {{ number_format((float) $sumberEnergi->kapasitas, 2, ',', '.') }}
            </h3>
        </div>

        <div>
            <p style="font-size:12px; color:var(--muted); margin-bottom:6px;">Lokasi</p>
            <h3 style="color:var(--deep-green); margin:0;">
                {{ $sumberEnergi->lokasi }}
            </h3>
        </div>

        <div>
            <p style="font-size:12px; color:var(--muted); margin-bottom:6px;">Status</p>
            @if ($sumberEnergi->status_aktif)
                <span style="display:inline-block; padding:7px 12px; border-radius:99px; background:#e9f4e4; color:#23764d; font-size:12px; font-weight:700;">
                    Aktif
                </span>
            @else
                <span style="display:inline-block; padding:7px 12px; border-radius:99px; background:#fff0ed; color:#a43b37; font-size:12px; font-weight:700;">
                    Tidak Aktif
                </span>
            @endif
        </div>
    </div>

    <div style="border-top:1px solid var(--line); margin-top:28px; padding-top:22px;">
        <a href="{{ route('sumber-energi.index') }}" class="button button-quiet">
            Kembali
        </a>
    </div>
</div>
@endsection
