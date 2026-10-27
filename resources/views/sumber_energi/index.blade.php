@extends('layouts.app')

@section('title', 'Kelola Sumber Energi')

@section('content')
<div class="page-heading" style="display:flex; justify-content:space-between; align-items:flex-end; gap:20px; margin-bottom:28px;">
    <div>
        <span class="eyebrow">SDG 7 · ENERGI BERSIH</span>
        <h1 style="font-size:32px; font-weight:800; font-family:'Manrope',sans-serif; color:var(--deep-green); margin:12px 0 4px;">
            Kelola Sumber Energi
        </h1>
        <p style="color:var(--muted); font-size:14px; margin:0;">
            Tambah, lihat, dan kelola data sumber energi.
        </p>
    </div>

    <a href="{{ route('sumber-energi.create') }}" class="button button-primary">
        + Tambah Sumber Energi
    </a>
</div>

@if (session('success'))
    <div class="notice" style="margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

<div style="background:#fff; border:1px solid var(--line); border-radius:16px; padding:16px 20px; margin-bottom:24px;">
    <p style="margin:0; color:var(--muted); font-size:13px;">
        Data sumber energi yang terdaftar dalam sistem SDG7 Learn.
    </p>
</div>

<div style="background:#fff; border:1px solid var(--line); border-radius:20px; overflow:hidden; box-shadow:var(--shadow); margin-bottom:24px;">
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; text-align:left; font-size:13px;">
            <thead>
                <tr style="background:#f7f9f6; border-bottom:1px solid var(--line); color:var(--deep-green);">
                    <th style="padding:16px 20px;">No.</th>
                    <th style="padding:16px 20px;">Nama Energi</th>
                    <th style="padding:16px 20px;">Jenis Energi</th>
                    <th style="padding:16px 20px;">Kapasitas</th>
                    <th style="padding:16px 20px;">Lokasi</th>
                    <th style="padding:16px 20px;">Status</th>
                    <th style="padding:16px 20px; text-align:right;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sumberEnergi as $energi)
                    <tr style="border-bottom:1px solid var(--line);">
                        <td style="padding:16px 20px; color:var(--muted);">
                            {{ $sumberEnergi->firstItem() + $loop->index }}
                        </td>

                        <td style="padding:16px 20px; font-weight:700; color:var(--deep-green);">
                            {{ $energi->nama_energi }}
                        </td>

                        <td style="padding:16px 20px;">
                            {{ $energi->jenis_energi }}
                        </td>

                        <td style="padding:16px 20px; white-space:nowrap;">
                            {{ number_format((float) $energi->kapasitas, 2, ',', '.') }}
                        </td>

                        <td style="padding:16px 20px;">
                            {{ $energi->lokasi }}
                        </td>

                        <td style="padding:16px 20px;">
                            @if ($energi->status_aktif)
                                <span style="display:inline-block; padding:6px 10px; border-radius:99px; background:#e9f4e4; color:#23764d; font-size:11px; font-weight:700;">
                                    Aktif
                                </span>
                            @else
                                <span style="display:inline-block; padding:6px 10px; border-radius:99px; background:#fff0ed; color:#a43b37; font-size:11px; font-weight:700;">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>

                        <td style="padding:16px 20px; text-align:right;">
                            <div style="display:inline-flex; align-items:center; gap:6px;">
                                <a href="{{ route('sumber-energi.show', $energi->id) }}"
                                   class="button button-quiet button-small">
                                    Detail
                                </a>

                                <a href="{{ route('sumber-energi.edit', $energi->id) }}"
                                   class="button button-quiet button-small">
                                    Edit
                                </a>

                                <form action="{{ route('sumber-energi.destroy', $energi->id) }}"
                                      method="POST"
                                      style="display:inline; margin:0;"
                                      onsubmit="return confirm('Yakin ingin menghapus sumber energi ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="button button-danger button-small">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding:40px 20px; text-align:center; color:var(--muted);">
                            <strong style="display:block; color:var(--deep-green); margin-bottom:6px;">
                                Belum ada data sumber energi
                            </strong>
                            Tambahkan data pertama menggunakan tombol Tambah Sumber Energi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if (method_exists($sumberEnergi, 'links'))
    <div style="display:flex; justify-content:center;">
        {{ $sumberEnergi->links() }}
    </div>
@endif
@endsection
