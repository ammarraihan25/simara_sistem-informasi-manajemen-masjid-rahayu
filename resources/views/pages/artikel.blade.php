@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 60px 0;">
    <div class="container">
        <h1>Artikel & Kegiatan</h1>
        <p>Berita terbaru dan dokumentasi kegiatan Masjid Rahayu</p>
    </div>
</div>

<section>
    <div class="container">
        <!-- Saya ubah sekalian auto-fit jadi auto-fill agar halamannya konsisten -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
            @forelse($articles as $art)
            <div class="card">
                <img src="{{ $art->image ?? 'https://via.placeholder.com/800x500?text=Masjid+Rahayu' }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; margin-bottom: 20px;">
                <span style="color: var(--secondary); font-size: 0.8rem; font-weight: 600">{{ $art->date }}</span>
                <h3 style="margin: 10px 0">{{ $art->title }}</h3>
                <p style="color: var(--text-muted)">{{ Str::limit($art->content, 150) }}</p>
                <a href="{{ route('artikel.detail', $art->slug) }}" style="display: inline-block; margin-top: 10px; padding: 8px 20px; background-color: var(--primary); color: white; border-radius: 8px; font-weight: 500; text-decoration: none; transition: 0.3s;">
                    Baca Selengkapnya →
                </a>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px;">
                <p style="color: var(--text-muted)">Belum ada artikel yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
