@extends('layouts.app')

@section('content')
<section class="container" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div class="card" style="width: 100%; max-width: 400px; padding: 40px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <i data-lucide="lock" style="width: 48px; height: 48px; color: var(--primary); margin-bottom: 15px;"></i>
            <h2>Login Admin</h2>
            <p style="color: var(--text-muted)">Masuk ke Dashboard SIMARA</p>
        </div>

        @if($errors->any())
            <div style="background: #fee2e2; color: #991b1b; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Email Address</label>
                <input type="email" name="email" class="form-control" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px;" placeholder="admin@masjidrahayu.com" required value="{{ old('email') }}">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Password</label>
                <input type="password" name="password" class="form-control" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px;" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Masuk Sekarang</button>
        </form>
        <div style="margin-top: 20px; text-align: center;">
            <a href="{{ route('home') }}" style="color: var(--text-muted); font-size: 0.9rem">← Kembali ke Beranda</a>
        </div>
    </div>
</section>
@endsection
