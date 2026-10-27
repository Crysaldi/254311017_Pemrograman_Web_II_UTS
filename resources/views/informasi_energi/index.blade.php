
@extends('layouts.app')

@section('title', 'Informasi Energi Indonesia')

@section('content')
<div style="max-width:1200px; margin:0 auto; padding:24px 20px 48px;">
    <span class="eyebrow">SDG 7 · ENERGI BERSIH</span>

    <h1 style="font-size:clamp(28px,4vw,42px); color:var(--deep-green); font-weight:800; margin:12px 0;">
        Informasi Energi Indonesia
    </h1>

    <p style="color:var(--muted); max-width:680px; line-height:1.8;">
        Kenali berbagai pembangkit energi di Indonesia, mulai dari energi surya,
        air, angin, hingga sumber energi lainnya. Pelajari jenis energi,
        kapasitas, lokasi, dan status operasionalnya.
    </p>

    <div style="display:flex; gap:10px; flex-wrap:wrap; margin:24px 0;">
        <a href="{{ url('/') }}" class="button button-quiet">
            ← Beranda
        </a>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(260px,1fr)); gap:20px;">
        @forelse ($sumberEnergis as $energi)
            <article style="background:#fff; border:1px solid var(--line); border-radius:18px; padding:22px; box-shadow:var(--shadow);">
                <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; margin-bottom:18px;">
                    <span class="eyebrow">PEMBANGKIT ENERGI</span>

                    @if ($energi->status_aktif)
                        <span style="background:#e9f4e4; color:#23764d; padding:6px 10px; border-radius:99px; font-size:11px; font-weight:700;">
                            Aktif
                        </span>
                    @else
                        <span style="background:#fff0ed; color:#a43b37; padding:6px 10px; border-radius:99px; font-size:11px; font-weight:700;">
                            Tidak Aktif
                        </span>
                    @endif
                </div>

                <h2 style="font-size:21px; color:var(--deep-green); margin:0 0 8px;">
                    {{ $energi->nama_energi }}
                </h2>

                <p style="color:var(--muted); margin:0 0 20px;">
                    {{ $energi->jenis_energi }}
                </p>

                <div style="border-top:1px solid var(--line); padding-top:16px;">
                    <p style="font-size:12px; color:var(--muted); margin:0 0 5px;">
                        Kapasitas
                    </p>
                    <p style="font-size:20px; font-weight:800; color:var(--deep-green); margin:0 0 16px;">
                        {{ number_format((float) $energi->kapasitas, 2, ',', '.') }}
                    </p>

                    <p style="font-size:12px; color:var(--muted); margin:0 0 5px;">
                        Lokasi
                    </p>
                    <p style="margin:0; color:var(--deep-green);">
                        {{ $energi->lokasi }}
                    </p>
                </div>
            </article>
        @empty
            <div style="grid-column:1/-1; background:#fff; border:1px solid var(--line); border-radius:18px; padding:36px; text-align:center;">
                <h2 style="color:var(--deep-green);">Belum ada informasi energi</h2>
                <p style="color:var(--muted);">
                    Data pembangkit akan ditampilkan di sini setelah ditambahkan oleh admin.
                </p>
            </div>
        @endforelse
    </div>

    <div style="margin-top:24px;">
        {{ $sumberEnergis->links() }}
    </div>
</div>
@endsection
