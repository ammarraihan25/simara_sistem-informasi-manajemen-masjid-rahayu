@extends('layouts.app')

@section('content')
<header class="hero">
    <div class="container">
        <h1>Masjid Rahayu Surakarta</h1>
        <p>Pusat Ibadah, Pendidikan, dan Dakwah. Pengelolaan masjid yang transparan dan akuntabel.</p>
        <div style="display: flex; gap: 15px; justify-content: center;">
            <a href="{{ route('jadwal') }}" class="btn btn-primary">Jadwal Sholat</a>
            <a href="{{ route('tentang') }}" class="btn" style="background: white; color: var(--primary)">Profil Masjid</a>
        </div>
    </div>
</header>

<section class="container">
    <div style="text-align: center; margin-bottom: 50px;">
        <h2>Jadwal Sholat Hari Ini</h2>
        <p style="color: var(--text-muted)">{{ date('d F Y') }}</p>
    </div>
    
    @if($todaySchedule)
    <div class="prayer-grid">
        <div class="prayer-card"><h4>Subuh</h4><div class="time">{{ $todaySchedule->subuh }}</div></div>
        <div class="prayer-card active"><h4>Dzuhur</h4><div class="time">{{ $todaySchedule->dzuhur }}</div></div>
        <div class="prayer-card"><h4>Ashar</h4><div class="time">{{ $todaySchedule->ashar }}</div></div>
        <div class="prayer-card"><h4>Maghrib</h4><div class="time">{{ $todaySchedule->maghrib }}</div></div>
        <div class="prayer-card"><h4>Isya</h4><div class="time">{{ $todaySchedule->isya }}</div></div>
    </div>
    <div style="margin-top: 30px; text-align: center; background: white; padding: 20px; border-radius: 12px; border: 1px solid var(--border);">
        <p><strong>Imam:</strong> {{ $todaySchedule->petugas_imam }} | <strong>Muadzin:</strong> {{ $todaySchedule->petugas_muadzin }}</p>
    </div>
    @else
    <p style="text-align: center;">Jadwal belum tersedia untuk hari ini.</p>
    @endif
</section>

<section style="background: white;">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
            <h2>Artikel Terbaru</h2>
            <a href="{{ route('artikel') }}" style="color: var(--secondary); font-weight: 600">Lihat Semua →</a>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            @foreach($latestArticles as $art)
            <div class="card">
                <img src="{{ $art->image ?? 'https://via.placeholder.com/400x250' }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                <h3 style="margin: 15px 0">{{ $art->title }}</h3>
                <p style="color: var(--text-muted)">{{ Str::limit($art->content, 100) }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
