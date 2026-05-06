@extends('layouts.app')

@section('content')
<div style="background: #f1f5f9; min-height: 100vh;">
    <div class="container" style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1>Kelola Artikel & Kegiatan</h1>
                <p style="color: var(--text-muted)">Publikasikan berita dan dokumentasi masjid</p>
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
                <h3>Buat Artikel Baru</h3>
                <form action="{{ route('admin.articles.store') }}" method="POST" style="margin-top: 20px;">
                    @csrf
                    <div class="form-group" style="margin-bottom: 15px;"><label>Judul Artikel</label><input type="text" name="title" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>Tanggal Kegiatan</label><input type="date" name="date" class="form-control" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 15px;"><label>URL Gambar</label><input type="text" name="image" placeholder="https://..." class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></div>
                    <div class="form-group" style="margin-bottom: 20px;"><label>Konten</label><textarea name="content" class="form-control" rows="8" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;"></textarea></div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Terbitkan Artikel</button>
                </form>
            </div>

            <div class="card">
                <h3>Daftar Artikel</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px;">
                    @foreach($articles as $art)
                    <div style="border: 1px solid var(--border); border-radius: 8px; overflow: hidden;">
                        <img src="{{ $art->image ?? 'https://via.placeholder.com/200x120' }}" style="width:100%; height:120px; object-fit:cover;">
                        <div style="padding: 10px;">
                            <h4 style="font-size: 0.9rem; margin-bottom: 10px;">{{ $art->title }}</h4>
                            
                            <!-- Dibungkus display: flex agar Edit dan Hapus bersebelahan -->
                            <div style="display: flex; gap: 15px; align-items: center;">
                                <a href="{{ route('admin.articles.edit', $art->id) }}" style="color: var(--secondary); font-size: 0.8rem; text-decoration: none;">Edit</a>
                                
                                <form action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" style="margin: 0;">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="color: #ef4444; border:none; background:none; cursor:pointer; font-size: 0.8rem;" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
