<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda dengan artikel dan kontennya.
     */
    public function index()
    {
        // Ambil artikel pertama (atau bisa diubah sesuai logika kebutuhan)
        $article = Article::with('user')->latest()->first();

        if (!$article) {
            return view('welcome')->with('error', 'Tidak ada artikel ditemukan.');
        }

        return view('welcome', [
            'article' => $article
        ]);
    }
}
