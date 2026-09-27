<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AcademicProfileController extends Controller
{
    public const DEFAULT_NRP = '5025241016';

    public function home(): View
    {
        return view('home', [
            'profile' => $this->profileData(self::DEFAULT_NRP),
        ]);
    }

    public function dashboard(): View
    {
        return view('dashboard', [
            'profile' => $this->profileData(self::DEFAULT_NRP),
        ]);
    }

    public function profile(string $nrp): View
    {
        return view('mahasiswa', [
            'profile' => $this->profileData($nrp),
        ]);
    }

    public function agent(?string $tema = null): View
    {
        $theme = $tema ?: 'General Assistant Agent';

        return view('agent', [
            'theme' => $theme,
            'profile' => $this->profileData(self::DEFAULT_NRP),
        ]);
    }

    public function calculateGpa(float $ip1, float $ip2): View
    {
        $total = $ip1 + $ip2;
        $average = $total / 2;

        $predicate = match (true) {
            $average >= 3.51 => 'Dengan Pujian (Cum Laude)',
            $average >= 3.01 => 'Sangat Memuaskan',
            $average >= 2.76 => 'Memuaskan',
            default => 'Cukup',
        };

        return view('ipk', [
            'ip1' => $ip1,
            'ip2' => $ip2,
            'total' => $total,
            'average' => $average,
            'predicate' => $predicate,
            'profile' => $this->profileData(self::DEFAULT_NRP),
        ]);
    }

    public function notFound(): mixed
    {
        return response()->view('errors.not-found', [
            'profile' => $this->profileData(self::DEFAULT_NRP),
        ], 404);
    }

    private function profileData(string $nrp): array
    {
        return [
            'name' => 'Farrel Hasudungan Immanuel Limbong',
            'nrp' => $nrp,
            'program' => 'Teknik Informatika',
            'faculty' => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
            'university' => 'Institut Teknologi Sepuluh Nopember',
            'cohort' => 'Angkatan 2024',
            'semester' => 'Semester 5 / Ganjil 2026-2027',
            'focus' => 'Agentic AI & Software Engineering',
            'advisor' => 'Agus Budi Raharjo, S.Kom, M.Kom., Ph.D.',
            'email' => '5025241016@student.its.ac.id',
            'status' => 'Mahasiswa Aktif',
            'campus' => 'Kampus ITS Sukolilo, Surabaya',
            'labs' => [
                'Laboratorium Rekayasa Perangkat Lunak (RPL)',
                'Laboratorium Komputasi Cerdas dan Visi (KCV)',
            ],
            'courses' => [
                ['code' => 'IF234401', 'name' => 'Pemrograman Berbasis Kerangka Kerja', 'sks' => 3, 'grade' => 'A', 'status' => 'Sedang Ditempuh'],
                ['code' => 'IF234301', 'name' => 'Struktur Data & Algoritma', 'sks' => 4, 'grade' => 'A', 'status' => 'Lulus'],
                ['code' => 'IF234302', 'name' => 'Sistem Basis Data', 'sks' => 4, 'grade' => 'A', 'status' => 'Lulus'],
                ['code' => 'IF234403', 'name' => 'Rekayasa Sistem Berbasis Pengetahuan', 'sks' => 3, 'grade' => 'A', 'status' => 'Sedang Ditempuh'],
                ['code' => 'IF234303', 'name' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'grade' => 'A', 'status' => 'Lulus'],
                ['code' => 'IF234404', 'name' => 'Data Mining', 'sks' => 3, 'grade' => 'A', 'status' => 'Sedang Ditempuh'],
            ],
        ];
    }
}
