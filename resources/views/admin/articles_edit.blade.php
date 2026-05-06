@extends('layouts.app')

@section('content')
<div style="background: #f1f5f9; min-height: 100vh;">
    <div class="container" style="padding: 40px 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1>Edit Artikel</h1>
                <p style="color: var(--text-muted)">Perbarui informasi artikel yang sudah diterbitkan</p>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="btn" style="background: white; border: 1px solid var(--border);">← Kembali</a>
        </div>

        <div class="card" style="max-width: 800px; margin: 0 auto;">
            <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Wajib untuk Update di Laravel -->

                <div class="form-group" style="margin-bottom: 15px;">
                    <label>Judul Artikel</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date', $article->date) }}" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label>URL Gambar</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image', $article->image) }}" placeholder="https://..." style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Konten</label>
                    <textarea name="content" class="form-control" rows="12" required style="width:100%; padding:10px; border:1px solid #ddd; border-radius:8px;">{{ old('content', $article->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection