@extends('layouts.app')

@section('content')
<div class="hero" style="padding: 60px 0;">
    <div class="container">
        <h1>Kontak Kami</h1>
        <p>Hubungi pengurus Masjid Rahayu</p>
    </div>
</div>

<section class="container">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
        <div class="card">
            <h3>Informasi Kontak</h3>
            <div style="margin-top: 20px; display: flex; flex-direction: column; gap: 20px;">
                <div style="display: flex; gap: 15px;">
                    <i data-lucide="map-pin" style="color: var(--secondary)"></i>
                    <p>Jl. Songgorunggi No. 17C, Bumi, Kec.Laweyan, Kota Surakarta.</p>
                </div>
                <div style="display: flex; gap: 15px;">
                    <i data-lucide="phone" style="color: var(--secondary)"></i>
                    <p>+62 812-3456-7890</p>
                </div>
                <div style="display: flex; gap: 15px;">
                    <i data-lucide="mail" style="color: var(--secondary)"></i>
                    <p>info@masjidrahayu.com</p>
                </div>
            </div>
            <div style="margin-top: 30px;">
                <h4>Lokasi Peta</h4>
                <div style="height: 250px; background: #eee; border-radius: 8px; margin-top: 15px; overflow: hidden;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0212!2d110.8!3d-7.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMzAnMDAuMCJTIDExMMKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1620000000000" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="card">
            <h3>Kirim Pesan</h3>
            <form action="#" method="POST" style="margin-top: 20px;">
                @csrf
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px;">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px;" required>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px;">WhatsApp / Email</label>
                    <input type="text" class="form-control" name="contact" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px;" required>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px;">Pesan</label>
                    <textarea class="form-control" name="message" rows="5" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px;" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim Pesan</button>
            </form>
        </div>
    </div>
</section>
@endsection
