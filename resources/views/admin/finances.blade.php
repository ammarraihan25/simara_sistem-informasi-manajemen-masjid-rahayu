@extends('layouts.app')

@section('content')
<div style="background: #f1f5f9; min-height: 100vh;">
    <div class="container" style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1>Kelola Keuangan</h1>
                <p style="color: var(--text-muted)">Catat pemasukan (infaq) dan pengeluaran operasional</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn" style="background: white; border: 1px solid var(--border);">← Dashboard</a>
        </div>

        <!-- Summary Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
            <div class="card" style="padding: 20px; border-left: 5px solid #22c55e;">
                <p style="font-size: 0.8rem; color: var(--text-muted)">Total Pemasukan</p>
                <h3 style="color: #166534">Rp {{ number_format(\App\Models\Finance::where('type', 'pemasukan')->sum('amount'), 0, ',', '.') }}</h3>
            </div>
            <div class="card" style="padding: 20px; border-left: 5px solid #ef4444;">
                <p style="font-size: 0.8rem; color: var(--text-muted)">Total Pengeluaran</p>
                <h3 style="color: #991b1b">Rp {{ number_format(\App\Models\Finance::where('type', 'pengeluaran')->sum('amount'), 0, ',', '.') }}</h3>
            </div>
            <div class="card" style="padding: 20px; border-left: 5px solid var(--primary); background: var(--primary); color: white;">
                <p style="font-size: 0.8rem; opacity: 0.8">Saldo Akhir</p>
                <h3 style="color: white">Rp {{ number_format(\App\Models\Finance::where('type', 'pemasukan')->sum('amount') - \App\Models\Finance::where('type', 'pengeluaran')->sum('amount'), 0, ',', '.') }}</h3>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 30px;">
            <div class="card" style="padding: 30px;">
                <h3>Grafik Perbandingan Kas</h3>
                <div style="height: 300px; display: flex; justify-content: center; margin-top: 20px;">
                    <canvas id="financeChart"></canvas>
                </div>
            </div>
            <div class="card" style="padding: 30px;">
                <h3>Keterangan</h3>
                <ul style="margin-top: 20px; list-style: none; padding: 0;">
                    <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span style="width: 20px; height: 20px; background: #22c55e; border-radius: 4px;"></span>
                        <span><strong>Pemasukan:</strong> Dana dari Infaq, Donasi, dll.</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                        <span style="width: 20px; height: 20px; background: #ef4444; border-radius: 4px;"></span>
                        <span><strong>Pengeluaran:</strong> Biaya operasional, Listrik, dll.</span>
                    </li>
                </ul>
                <p style="font-size: 0.9rem; color: var(--text-muted); border-top: 1px solid #eee; padding-top: 15px; margin-top: 15px;">
                    Grafik ini membantu Anda memantau efisiensi penggunaan dana masjid secara transparan.
                </p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('financeChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Pemasukan', 'Pengeluaran'],
                        datasets: [{
                            data: [
                                {{ \App\Models\Finance::where('type', 'pemasukan')->sum('amount') }},
                                {{ \App\Models\Finance::where('type', 'pengeluaran')->sum('amount') }}
                            ],
                            backgroundColor: ['#22c55e', '#ef4444'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            });
        </script>

        @if(session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
            <div class="card">
                <h3>Catat Transaksi</h3>
                <form action="{{ route('admin.finances.store') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <div class="form-group" style="margin-bottom: 15px;"><label>Tanggal</label><input type="date" name="date" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label>Tipe</label>
                        <select name="type" class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                            <option value="pemasukan">Pemasukan (Infaq/Donasi)</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>Kategori</label><input type="text" name="category" placeholder="Contoh: Infaq Jumat" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>Jumlah (Rp)</label><input type="number" name="amount" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 20px;"><label>Keterangan</label><textarea name="description" class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></textarea></div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Transaksi</button>
                </form>
            </div>

            <div class="card">
                <h3>Riwayat Keuangan</h3>
                <div style="overflow-x: auto; margin-top: 20px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 2px solid var(--border); text-align: left;">
                                <th style="padding: 10px;">Tanggal</th>
                                <th style="padding: 10px;">Kategori</th>
                                <th style="padding: 10px; text-align: right;">Jumlah</th>
                                <th style="padding: 10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($finances as $f)
                            <tr style="border-bottom: 1px solid var(--border);">
                                <td style="padding: 10px;">{{ $f->date }}</td>
                                <td style="padding: 10px;">{{ $f->category }}</td>
                                <td style="padding: 10px; text-align: right; color: {{ $f->type == 'pemasukan' ? '#166534' : '#ef4444' }}">
                                    {{ $f->type == 'pemasukan' ? '+' : '-' }} Rp {{ number_format($f->amount, 0, ',', '.') }}
                                </td>
                                <td style="padding: 10px;">
                                    <form action="{{ route('admin.finances.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
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
