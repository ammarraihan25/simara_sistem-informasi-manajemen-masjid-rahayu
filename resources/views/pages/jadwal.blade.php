@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 60px 0;">
    <div class="container">
        <h1>Jadwal Sholat</h1>
        <p>Informasi waktu ibadah harian Masjid Rahayu</p>
    </div>
</div>

<section class="container">
    <div class="card" style="margin-bottom: 40px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3>Daftar Jadwal</h3>
            <form action="{{ route('jadwal') }}" method="GET">
                <input type="date" name="date" class="form-control" style="width: 200px;" value="{{ request('date', date('Y-m-d')) }}" onchange="this.form.submit()">
            </form>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                        <th style="padding: 15px;">Tanggal</th>
                        <th style="padding: 15px;">Subuh</th>
                        <th style="padding: 15px;">Dzuhur</th>
                        <th style="padding: 15px;">Ashar</th>
                        <th style="padding: 15px;">Maghrib</th>
                        <th style="padding: 15px;">Isya</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $s)
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 15px;">{{ $s->date }}</td>
                        <td style="padding: 15px;">{{ $s->subuh }}</td>
                        <td style="padding: 15px;">{{ $s->dzuhur }}</td>
                        <td style="padding: 15px;">{{ $s->ashar }}</td>
                        <td style="padding: 15px;">{{ $s->maghrib }}</td>
                        <td style="padding: 15px;">{{ $s->isya }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 30px; text-align: center; color: var(--text-muted)">Belum ada data jadwal.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</section>
@endsection
