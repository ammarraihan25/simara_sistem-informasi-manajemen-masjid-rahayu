<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Finance;
use App\Models\Article;

class PublicController extends Controller
{
    public function home()
    {
        $todaySchedule = Schedule::where('date', date('Y-m-d'))->first() ?? Schedule::latest('date')->first();
        $latestArticles = Article::latest('date')->take(3)->get();
        return view('pages.home', compact('todaySchedule', 'latestArticles'));
    }

    public function jadwal()
    {
        $schedules = Schedule::orderBy('date', 'desc')->get();
        return view('pages.jadwal', compact('schedules'));
    }

    public function keuangan()
    {
        $finances = Finance::orderBy('date', 'desc')->get();
        $totalMasuk = Finance::where('type', 'pemasukan')->sum('amount');
        $totalKeluar = Finance::where('type', 'pengeluaran')->sum('amount');
        $saldo = $totalMasuk - $totalKeluar;
        return view('pages.keuangan', compact('finances', 'totalMasuk', 'totalKeluar', 'saldo'));
    }

    public function artikel()
    {
        $articles = Article::latest('date')->get();
        return view('pages.artikel', compact('articles'));
    }

    public function showArticle($slug)
    {
        // Best Practice: Gunakan firstOrFail() agar jika artikel 
        // tidak ditemukan, Laravel otomatis menampilkan halaman 404 Not Found.
        $article = Article::where('slug', $slug)->firstOrFail();
        
        return view('pages.artikel_detail', compact('article'));
    }

    public function tentang()
    {
        return view('pages.tentang');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }
}
