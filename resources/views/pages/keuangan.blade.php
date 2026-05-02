@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 60px 0;">
    <div class="container">
        <h1>Laporan Keuangan</h1>
        <p>Transparansi pengelolaan dana Masjid Rahayu</p>
    </div>
</div>

<section class="container">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div class="card" style="background: var(--primary); color: white;">
            <p style="opacity: 0.8">Total Pemasukan</p>
            <h2 style="color: white; margin: 10px 0">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</h2>
        </div>
        <div class="card" style="background: #ef4444; color: white;">
            <p style="opacity: 0.8">Total Pengeluaran</p>
            <h2 style="color: white; margin: 10px 0">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</h2>
        </div>
        <div class="card" style="background: var(--secondary); color: white;">
            <p style="opacity: 0.8">Saldo Kas</p>
            <h2 style="color: white; margin: 10px 0">Rp {{ number_format($saldo, 0, ',', '.') }}</h2>
        </div>
    </div>

    <div class="card">
        <h3>Rincian Transaksi</h3>
        <div style="overflow-x: auto; margin-top: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                        <th style="padding: 15px;">Tanggal</th>
                        <th style="padding: 15px;">Kategori</th>
                        <th style="padding: 15px;">Keterangan</th>
                        <th style="padding: 15px; text-align: right;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $f)
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 15px;">{{ $f->date }}</td>
                        <td style="padding: 15px;">
                            <span style="padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; background: {{ $f->type == 'pemasukan' ? '#dcfce7' : '#fee2e2' }}; color: {{ $f->type == 'pemasukan' ? '#166534' : '#991b1b' }}">
                                {{ $f->category }}
                            </span>
                        </td>
                        <td style="padding: 15px;">{{ $f->description }}</td>
                        <td style="padding: 15px; text-align: right; font-weight: 600; color: {{ $f->type == 'pemasukan' ? '#166534' : '#ef4444' }}">
                            {{ $f->type == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($f->amount, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
