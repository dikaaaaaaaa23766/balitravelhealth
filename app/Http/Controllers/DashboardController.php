<?php

namespace App\Http\Controllers;

use App\Models\MedicalGuide; // Pastikan path ke model Anda sudah benar
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard aplikasi.
     */
    public function index()
    {
        // Mengambil semua data 'guides' beserta relasi 'submenus' dan 'articles'
        // Ini adalah cara yang efisien untuk menghindari banyak query ke database
        $guides = MedicalGuide::with(['submenus.articles'])
                                ->orderBy('title', 'asc')
                                ->get();

        // Merender komponen 'Dashboard.vue' dan mengirimkan data 'guides' sebagai prop
        return Inertia::render('Dashboard', [
            'guides' => $guides,
        ]);
    }
}
