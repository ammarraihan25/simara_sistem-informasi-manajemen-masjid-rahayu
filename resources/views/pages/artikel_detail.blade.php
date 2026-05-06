@extends('layouts.app')

@section('content')
<div style="background: #f8fafc; padding: 40px 0;">
    <div class="container" style="max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 12px; box-shadow: var(--shadow-sm);">
        
        <!-- Tombol Kembali -->
        <a href="{{ route('artikel') }}" style="display: inline-block; margin-bottom: 20px; color: var(--secondary); font-weight: 500;">
            ← Kembali ke Daftar Artikel
        </a>

        <!-- Header Artikel -->
        <h1 style="font-size: 2.5rem; margin-bottom: 15px; color: var(--text-main);">{{ $article->title }}</h1>
        <p style="color: var(--text-muted); font-size: 0.95rem; border-bottom: 1px solid var(--border); padding-bottom: 20px; margin-bottom: 30px;">
            Diterbitkan pada: {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}
        </p>

        <!-- Gambar Utama -->
        @if($article->image)
            <img src="{{ $article->image }}" alt="{{ $article->title }}" style="width: 100%; height: auto; max-height: 450px; object-fit: cover; border-radius: 8px; margin-bottom: 30px;">
        @endif

        <!-- Isi Artikel -->
        <div style="font-size: 1.1rem; line-height: 1.8; color: var(--text-main); text-align: justify; white-space: pre-line;">
            {{ $article->content }}
        </div>
        
    </div>
</div>
@endsection