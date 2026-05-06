<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Schedule;
use App\Models\Finance;
use App\Models\Article;

class AdminController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalArticles = Article::count();
        $totalSchedules = Schedule::count();
        
        $totalMasuk = Finance::where('type', 'pemasukan')->sum('amount');
        $totalKeluar = Finance::where('type', 'pengeluaran')->sum('amount');
        $saldo = $totalMasuk - $totalKeluar;
        
        return view('admin.dashboard', compact('totalArticles', 'totalSchedules', 'saldo'));
    }

    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function usersStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return back()->with('success', 'User admin baru berhasil ditambahkan.');
    }

    public function usersDestroy(User $user)
    {
        if (User::count() <= 1) {
            return back()->withErrors(['msg' => 'Tidak bisa menghapus admin terakhir.']);
        }
        $user->delete();
        return back()->with('success', 'User admin berhasil dihapus.');
    }

    // Manajemen Jadwal
    public function schedulesIndex()
    {
        $schedules = Schedule::orderBy('date', 'desc')->get();
        return view('admin.schedules', compact('schedules'));
    }

    public function schedulesStore(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'subuh' => 'required',
            'dzuhur' => 'required',
            'ashar' => 'required',
            'maghrib' => 'required',
            'isya' => 'required',
            'petugas_imam' => 'required',
            'petugas_muadzin' => 'nullable',
            'petugas_khotib' => 'nullable',
        ]);

        Schedule::create($data);
        return back()->with('success', 'Jadwal baru berhasil ditambahkan.');
    }

    public function schedulesDestroy(Schedule $schedule)
    {
        $schedule->delete();
        return back()->with('success', 'Jadwal berhasil dihapus.');
    }

    // Manajemen Keuangan
    public function financesIndex()
    {
        $finances = Finance::orderBy('date', 'desc')->get();
        return view('admin.finances', compact('finances'));
    }

    public function financesStore(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:pemasukan,pengeluaran',
            'category' => 'required',
            'amount' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Finance::create($data);
        return back()->with('success', 'Transaksi keuangan berhasil dicatat.');
    }

    public function financesDestroy(Finance $finance)
    {
        $finance->delete();
        return back()->with('success', 'Data keuangan berhasil dihapus.');
    }

    // Manajemen Artikel
    public function articlesIndex()
    {
        $articles = Article::latest('date')->get();
        return view('admin.articles', compact('articles'));
    }

    public function articlesStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|url',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . time();
        Article::create($data);
        return back()->with('success', 'Artikel baru berhasil diterbitkan.');
    }

    public function articlesEdit(Article $article)
    {
        // Menampilkan halaman edit dengan membawa data artikel lama
        return view('admin.articles_edit', compact('article'));
    }

    public function articlesUpdate(Request $request, Article $article)
    {
        // 1. Validasi input (Best Practice Keamanan)
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'image' => 'nullable|url',
        ]);

        // Opsional: Update slug jika judul berubah
        $data['slug'] = Str::slug($data['title']) . '-' . time();

        // 2. Simpan pembaruan ke database
        $article->update($data);

        // 3. Kembalikan ke halaman daftar dengan pesan sukses
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function articlesDestroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Artikel berhasil dihapus.');
    }
}
