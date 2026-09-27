<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    /**
     * Default profile data for Farrel Hasudungan Immanuel Limbong (NRP: 5025241016)
     */
    public const DEFAULT_NRP = '5025241016';

    /**
     * Halaman Beranda (/ dan /beranda)
     * Mendukung Tantangan 2: parameter ?user=Nama di URL
     */
    public function home(Request $request): View
    {
        $userName = $request->query('user');

        return view('home', [
            'profile' => $this->getProfileData(),
            'userName' => $userName ? trim($userName) : null,
        ]);
    }

    /**
     * Halaman Profil Mahasiswa (/profil-mahasiswa)
     * Menggunakan komponen reusable <x-info-card>
     */
    public function profile(): View
    {
        return view('profil-mahasiswa', [
            'profile' => $this->getProfileData(),
        ]);
    }

    /**
     * Halaman Ide-Riset Platform Agentic AI (/ide-agent)
     * Mendukung Tantangan 1: parameter ?mode=dark di URL
     * Menampilkan formulir pengumpulan ide & visualisasi arsitektur agent
     */
    public function ideAgent(Request $request): View
    {
        $mode = $request->query('mode');

        return view('ide-agent', [
            'profile' => $this->getProfileData(),
            'mode' => $mode ? strtolower(trim($mode)) : null,
            'submittedIdea' => $request->session()->get('submitted_idea'),
        ]);
    }

    /**
     * Menangani pengumpulan formulir ide Agentic AI
     */
    public function submitIdea(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:100',
            'author_email' => 'required|email|max:100',
            'agent_category' => 'required|string|max:100',
            'idea_title' => 'required|string|max:150',
            'idea_description' => 'required|string|min:10|max:1000',
        ], [
            'author_name.required' => 'Nama pengusul ide wajib diisi.',
            'author_email.required' => 'Email pengusul ide wajib diisi.',
            'author_email.email' => 'Format email pengusul tidak valid.',
            'agent_category.required' => 'Pilih salah satu kategori Agentic AI.',
            'idea_title.required' => 'Judul usulan ide wajib diisi.',
            'idea_description.required' => 'Deskripsi rancangan ide wajib diisi minimal 10 karakter.',
        ]);

        $mode = $request->query('mode');

        return redirect()
            ->route('ide-agent', array_filter(['mode' => $mode]))
            ->with('submitted_idea', $validated)
            ->with('success', 'Usulan ide Agentic AI berhasil dikirim dan diverifikasi ke sistem!');
    }

    /**
     * Data profil akademik mahasiswa ITS
     */
    private function getProfileData(): array
    {
        return [
            'name' => 'Farrel Hasudungan Immanuel Limbong',
            'nrp' => self::DEFAULT_NRP,
            'program' => 'Teknik Informatika',
            'degree' => 'Sarjana (S1)',
            'faculty' => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
            'faculty_short' => 'FTEIC',
            'university' => 'Institut Teknologi Sepuluh Nopember',
            'cohort' => 'Angkatan 2024',
            'semester' => 'Semester 5 (Ganjil 2026/2027)',
            'focus' => 'Agentic AI, Autonomous Workflows & Software Engineering',
            'advisor' => 'Agus Budi Raharjo, S.Kom, M.Kom., Ph.D.',
            'advisor_nip' => '197408101999031002',
            'email' => '5025241016@student.its.ac.id',
            'status' => 'Mahasiswa Aktif',
            'campus' => 'Kampus ITS Sukolilo, Surabaya 60111',
            'gpa' => '3.88',
            'sks_completed' => 88,
            'total_target_sks' => 144,
            'labs' => [
                'Laboratorium Rekayasa Perangkat Lunak (RPL)',
                'Laboratorium Komputasi Cerdas dan Visi (KCV)',
            ],
            'skills' => [
                'Laravel 12 & PHP 8.2+',
                'Tailwind CSS v4 & Modern UI/UX',
                'Agentic AI & LLM Orchestration',
                'REST API & Vite Bundler',
                'PostgreSQL & SQLite',
                'Git & CI/CD Workflows',
            ],
            'courses' => [
                ['code' => 'IF234401', 'name' => 'Pemrograman Berbasis Kerangka Kerja', 'sks' => 3, 'grade' => 'A', 'status' => 'Sedang Ditempuh'],
                ['code' => 'IF234403', 'name' => 'Rekayasa Sistem Berbasis Pengetahuan', 'sks' => 3, 'grade' => 'A', 'status' => 'Sedang Ditempuh'],
                ['code' => 'IF234404', 'name' => 'Data Mining & Analitika Big Data', 'sks' => 3, 'grade' => 'A', 'status' => 'Sedang Ditempuh'],
                ['code' => 'IF234301', 'name' => 'Struktur Data & Algoritma', 'sks' => 4, 'grade' => 'A', 'status' => 'Lulus'],
                ['code' => 'IF234302', 'name' => 'Sistem Basis Data', 'sks' => 4, 'grade' => 'A', 'status' => 'Lulus'],
                ['code' => 'IF234303', 'name' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'grade' => 'A', 'status' => 'Lulus'],
            ],
            'agent_project' => [
                'name' => 'Autonomous Recruiting & Talent Screening Agent',
                'codename' => 'TalentMatch AI',
                'batch' => 'PBKK 2026',
                'role' => 'Lead System Architect & Frontend Designer',
            ],
        ];
    }
}
