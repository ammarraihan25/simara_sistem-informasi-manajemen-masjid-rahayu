@extends('layouts.app')

@section('content')
<div style="background: #f1f5f9; min-height: 100vh;">
    <div class="container" style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1 style="margin: 0;">Dashboard Admin</h1>
                <p style="color: var(--text-muted)">Selamat datang kembali, Takmir Masjid Rahayu</p>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn" style="background: #ef4444; color: white;">Keluar Sistem</button>
            </form>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
            <div class="card" onclick="window.location='{{ route('admin.articles.index') }}'" style="cursor: pointer;">
                <p style="color: var(--text-muted)">Total Artikel</p>
                <h2 style="font-size: 2rem; margin: 10px 0;">{{ $totalArticles }}</h2>
                <div style="color: var(--primary); font-size: 0.9rem;">Kelola Artikel →</div>
            </div>
            <div class="card" onclick="window.location='{{ route('admin.schedules.index') }}'" style="cursor: pointer;">
                <p style="color: var(--text-muted)">Data Jadwal</p>
                <h2 style="font-size: 2rem; margin: 10px 0;">{{ $totalSchedules }}</h2>
                <div style="color: var(--primary); font-size: 0.9rem;">Kelola Jadwal →</div>
            </div>
            <div class="card" onclick="window.location='{{ route('admin.users.index') }}'" style="cursor: pointer;">
                <p style="color: var(--text-muted)">Pengurus Admin</p>
                <h2 style="font-size: 2rem; margin: 10px 0;">{{ \App\Models\User::count() }}</h2>
                <div style="color: var(--primary); font-size: 0.9rem;">Kelola Admin →</div>
            </div>
            <div class="card" onclick="window.location='{{ route('admin.finances.index') }}'" style="cursor: pointer;">
                <p style="color: var(--text-muted)">Saldo Kas Masjid</p>
                <h2 style="font-size: 2rem; margin: 10px 0; color: var(--primary);">Rp {{ number_format($saldo, 0, ',', '.') }}</h2>
                <div style="color: var(--primary); font-size: 0.9rem;">Kelola Keuangan →</div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 40px;">
            <div class="card" style="padding: 30px;">
                <h3>Grafik Keuangan Masjid</h3>
                <div style="height: 250px; display: flex; justify-content: center; margin-top: 20px;">
                    <canvas id="dashboardChart"></canvas>
                </div>
            </div>
            <div class="card" style="padding: 30px;">
                <h4>Ringkasan Saldo</h4>
                <div style="margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span style="color: #22c55e; font-weight: 600;">● Pemasukan</span>
                        <span>Rp {{ number_format($saldo + \App\Models\Finance::where('type', 'pengeluaran')->sum('amount'), 0, ',', '.') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span style="color: #ef4444; font-weight: 600;">● Pengeluaran</span>
                        <span>Rp {{ number_format(\App\Models\Finance::where('type', 'pengeluaran')->sum('amount'), 0, ',', '.') }}</span>
                    </div>
                    <div style="border-top: 1px solid #eee; padding-top: 15px; display: flex; justify-content: space-between; font-weight: 700;">
                        <span>Sisa Saldo</span>
                        <span style="color: var(--primary)">Rp {{ number_format($saldo, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('dashboardChart').getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pemasukan', 'Pengeluaran'],
                        datasets: [{
                            data: [
                                {{ $saldo + \App\Models\Finance::where('type', 'pengeluaran')->sum('amount') }},
                                {{ \App\Models\Finance::where('type', 'pengeluaran')->sum('amount') }}
                            ],
                            backgroundColor: ['#22c55e', '#ef4444'],
                            borderWidth: 0,
                            cutout: '70%'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } }
                    }
                });
            });
        </script>

        <div class="card" style="padding: 40px; text-align: center;">
            <i data-lucide="settings" style="width: 48px; height: 48px; color: var(--text-muted); margin-bottom: 20px;"></i>
            <h3>Fitur Management (CRUD)</h3>
            <p style="max-width: 600px; margin: 15px auto; color: var(--text-muted);">
                Anda sudah berada di panel admin. Gunakan tombol di bawah untuk mulai mengelola data masjid secara digital.
            </p>
            <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-primary">+ Jadwal Baru</a>
                <a href="{{ route('admin.finances.index') }}" class="btn btn-primary">+ Catat Keuangan</a>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-primary">+ Buat Artikel</a>
            </div>
        </div>
    </div>
</div>
@endsection
