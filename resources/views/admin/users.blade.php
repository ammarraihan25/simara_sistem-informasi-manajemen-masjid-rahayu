@extends('layouts.app')

@section('content')
<div style="background: #f1f5f9; min-height: 100vh;">
    <div class="container" style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1>Manajemen Admin</h1>
                <p style="color: var(--text-muted)">Kelola akun takmir yang memiliki akses ke sistem</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn" style="background: white; border: 1px solid var(--border);">← Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
            <!-- Form Tambah -->
            <div class="card">
                <h3>Tambah Admin Baru</h3>
                <form action="{{ route('admin.users.store') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" style="width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 8px;" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" style="width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 8px;" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" style="width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 8px;" required minlength="8">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Akun</button>
                </form>
            </div>

            <!-- Daftar User -->
            <div class="card">
                <h3>Daftar Pengurus (Admin)</h3>
                <div style="overflow-x: auto; margin-top: 20px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                                <th style="padding: 15px;">Nama</th>
                                <th style="padding: 15px;">Email</th>
                                <th style="padding: 15px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 15px;">{{ $user->name }}</td>
                                <td style="padding: 15px;">{{ $user->email }}</td>
                                <td style="padding: 15px;">
                                    @if($user->id !== Auth::id())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus admin ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-weight: 600;">Hapus</button>
                                    </form>
                                    @else
                                    <span style="color: var(--text-muted); font-size: 0.8rem;">(Anda)</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
