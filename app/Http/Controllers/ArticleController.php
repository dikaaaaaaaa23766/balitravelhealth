<?php

namespace App\Http\Controllers;

use App\Models\MedicalGuideArticle; // Ganti dengan model Artikel Anda
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function show(MedicalGuideArticle $article)
    {
        // Nanti, Anda akan membuat view untuk ini.
        // Untuk sekarang, kita bisa kembalikan teks saja agar tidak error.
        return 'Menampilkan artikel: ' . $article->title;
    }
}