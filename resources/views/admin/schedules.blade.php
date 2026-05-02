@extends('layouts.app')

@section('content')
<div style="background: #f1f5f9; min-height: 100vh;">
    <div class="container" style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1>Kelola Jadwal Sholat</h1>
                <p style="color: var(--text-muted)">Input waktu sholat dan petugas imam harian</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn" style="background: white; border: 1px solid var(--border);">← Dashboard</a>
        </div>

        @if(session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
            <div class="card">
                <h3>Tambah Jadwal Baru</h3>
                <form action="{{ route('admin.schedules.store') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <div class="form-group" style="margin-bottom: 15px;"><label>Tanggal</label><input type="date" name="date" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 15px;">
                        <div><label>Subuh</label><input type="text" name="subuh" class="form-control" placeholder="04:30" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:8px;"></div>
                        <div><label>Dzuhur</label><input type="text" name="dzuhur" class="form-control" placeholder="11:45" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:8px;"></div>
                        <div><label>Ashar</label><input type="text" name="ashar" class="form-control" placeholder="15:00" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:8px;"></div>
                        <div><label>Maghrib</label><input type="text" name="maghrib" class="form-control" placeholder="17:40" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:8px;"></div>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>Isya</label><input type="text" name="isya" class="form-control" placeholder="18:50" required style="width:100%; padding:8px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>Petugas Imam</label><input type="text" name="petugas_imam" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>Petugas Khotib (Khusus Jumat)</label><input type="text" name="petugas_khotib" class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Jadwal</button>
                </form>
            </div>

            <div class="card">
                <h3>Daftar Jadwal Tersimpan</h3>
                <div style="overflow-x: auto; margin-top: 20px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                                <th style="padding: 10px;">Tanggal</th>
                                <th style="padding: 10px;">Subuh</th>
                                <th style="padding: 10px;">Dzuhur</th>
                                <th style="padding: 10px;">Ashar</th>
                                <th style="padding: 10px;">Maghrib</th>
                                <th style="padding: 10px;">Isya</th>
                                <th style="padding: 10px;">Imam</th>
                                <th style="padding: 10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $s)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 10px;">{{ $s->date }}</td>
                                <td style="padding: 10px;">{{ $s->subuh }}</td>
                                <td style="padding: 10px;">{{ $s->dzuhur }}</td>
                                <td style="padding: 10px;">{{ $s->ashar }}</td>
                                <td style="padding: 10px;">{{ $s->maghrib }}</td>
                                <td style="padding: 10px;">{{ $s->isya }}</td>
                                <td style="padding: 10px;">{{ $s->petugas_imam }}</td>
                                <td style="padding: 10px;">
                                    <form action="{{ route('admin.schedules.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal?')">
                                        @csrf @method('DELETE')
                                        <button style="color: #ef4444; border:none; background:none; cursor:pointer;">Hapus</button>
                                    </form>
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
