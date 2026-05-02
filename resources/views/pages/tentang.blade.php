@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 60px 0;">
    <div class="container">
        <h1>Tentang Kami</h1>
        <p>Mengenal lebih dekat Masjid Rahayu Surakarta</p>
    </div>
</div>

<section class="container">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 50px; align-items: center;">
        <div>
            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=1000" style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-lg);">
        </div>
        <div>
            <h2>Profil & Sejarah</h2>
            <p style="margin: 20px 0; color: var(--text-muted);">Masjid Rahayu berdiri sejak tahun 1995 sebagai pusat peribadatan masyarakat Laweyan. Berawal dari langgar kecil, kini Masjid Rahayu telah berkembang menjadi pusat dakwah yang aktif dengan berbagai program kemasyarakatan.</p>
            
            <h3 style="margin-top: 30px;">Visi Kami</h3>
            <p style="margin: 10px 0; color: var(--text-muted);">Menjadi masjid yang mandiri, makmur, dan menjadi rahmat bagi lingkungan sekitar melalui pengelolaan yang profesional dan transparan.</p>
            
            <h3 style="margin-top: 30px;">Tujuan SIMARA</h3>
            <p style="margin: 10px 0; color: var(--text-muted);">Sistem Informasi Manajemen Masjid Rahayu (SIMARA) dikembangkan untuk memudahkan jamaah dalam mengakses informasi dan sebagai sarana keterbukaan informasi publik bagi pengurus masjid.</p>
        </div>
    </div>
</section>
@endsection
