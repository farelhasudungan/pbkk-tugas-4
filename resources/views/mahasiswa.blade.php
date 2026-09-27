@extends('layouts.app')

@section('title', 'Detail Profil Mahasiswa - ' . $profile['name'])

@section('content')
<div class="relative">

    <!-- Header Section -->
    <section class="mx-auto max-w-5xl px-6 pt-12 pb-6 sm:pt-16">
        <div class="mb-4 flex flex-wrap items-center gap-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-blue-500/30 bg-blue-500/10 px-3 py-1 font-mono text-xs font-medium text-blue-600 dark:text-blue-400">
                <span class="size-2 rounded-full bg-blue-500"></span>
                <span>GET /mahasiswa/{{ $profile['nrp'] }}</span>
            </div>
            <span class="font-mono text-xs text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-0.5 rounded-full">
                Regex Verified: ^[0-9]{10}$
            </span>
        </div>

        <h1 class="text-3xl font-semibold leading-[1.08] tracking-tight text-zinc-900 dark:text-white sm:text-4xl lg:text-5xl font-display">
            Detail Profil <span class="gradient-text font-bold">Mahasiswa</span>
        </h1>

        <p class="mt-4 max-w-3xl text-base sm:text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
            Informasi lengkap pemilik Nomor Registrasi Pokok (NRP) <code class="rounded bg-blue-100 dark:bg-blue-900/40 px-2 py-0.5 font-mono text-sm font-bold text-blue-700 dark:text-blue-300">{{ $profile['nrp'] }}</code> di lingkungan Institut Teknologi Sepuluh Nopember. Rute ini diamankan menggunakan pembatasan pola ekspresi reguler.
        </p>
    </section>

    <!-- Identity Card (KTM Digital) -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 shadow-xs dark:shadow-none">
            <div class="grid md:grid-cols-[0.9fr_1.3fr]">
                
                <!-- Left Identity Banner -->
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-8 text-white flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs tracking-wider uppercase text-blue-200 font-semibold">ITS Student Identity</span>
                            <span class="inline-flex items-center gap-1 rounded-full bg-white/20 px-2.5 py-0.5 text-[11px] font-mono font-medium backdrop-blur-xs">
                                <span class="size-1.5 rounded-full bg-emerald-300"></span> Verified
                            </span>
                        </div>

                        <div class="mt-8 flex items-center gap-4">
                            <div class="glow-tile !w-20 !h-20 !rounded-2xl border border-white/20 shrink-0 text-2xl font-bold font-mono text-white bg-white/10 backdrop-blur-md">
                                FL
                            </div>
                            <div>
                                <h2 class="text-xl font-bold leading-snug">{{ $profile['name'] }}</h2>
                                <p class="font-mono text-sm text-blue-200 mt-1">NRP: {{ $profile['nrp'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-white/15 space-y-2 text-xs font-mono text-blue-100">
                        <div class="flex justify-between">
                            <span>Status:</span>
                            <span class="font-semibold text-white">{{ $profile['status'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Surel Kampus:</span>
                            <span class="font-semibold text-white">{{ $profile['email'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Kampus:</span>
                            <span class="font-semibold text-white">Sukolilo, Surabaya</span>
                        </div>
                    </div>
                </div>

                <!-- Right Identity Details -->
                <div class="p-8 flex flex-col justify-between">
                    <div>
                        <h3 class="font-mono text-xs uppercase tracking-wider text-zinc-500 font-semibold mb-4">
                            Atribut Akademik Mahasiswa
                        </h3>

                        <dl class="grid gap-x-6 gap-y-5 sm:grid-cols-2">
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Program Studi</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['program'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Fakultas</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['faculty'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Perguruan Tinggi</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['university'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Angkatan / Semester</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['cohort'] }} &bull; {{ $profile['semester'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Dosen Pembimbing Akademik</dt>
                                <dd class="mt-1 text-sm font-semibold text-blue-600 dark:text-blue-400">{{ $profile['advisor'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Fokus Riset & Keahlian</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['focus'] }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-8 pt-5 border-t border-zinc-100 dark:border-zinc-800 flex flex-wrap gap-2">
                        <span class="tag-pill">Teknik Informatika</span>
                        <span class="tag-pill">FTEIC ITS</span>
                        <span class="tag-pill">Kurikulum Merdeka 2024</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Laboratories & Research Interest -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold tracking-tight text-zinc-900 dark:text-white font-display">Laboratorium Riset Mahasiswa</h2>
                <p class="text-xs text-zinc-500 dark:text-zinc-400 font-mono mt-0.5">Fokus keilmuan dan minat pengembangan di DTIF ITS</p>
            </div>
            <span class="tag-pill">2 Lab Relevan</span>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 p-6 shadow-xs dark:shadow-none">
                <div class="flex items-center gap-3 mb-3">
                    <div class="glow-tile !w-10 !h-10 !rounded-lg border border-blue-500/30 shrink-0">
                        <span class="font-mono text-xs font-bold text-blue-500">RPL</span>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white">Rekayasa Perangkat Lunak</h3>
                        <p class="text-[11px] font-mono text-zinc-500">Software Engineering Laboratory</p>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                    Mendalami rekayasa sistem modern, pengembangan berbasis framework (Laravel/Livewire), arsitektur modular, clean code, serta integrasi CI/CD untuk aplikasi skala enterprise.
                </p>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 p-6 shadow-xs dark:shadow-none">
                <div class="flex items-center gap-3 mb-3">
                    <div class="glow-tile !w-10 !h-10 !rounded-lg border border-purple-500/30 shrink-0" style="--glow-color: #a855f7">
                        <span class="font-mono text-xs font-bold text-purple-500">KCV</span>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white">Komputasi Cerdas & Visi</h3>
                        <p class="text-[11px] font-mono text-zinc-500">Intelligent Computing & Vision Lab</p>
                    </div>
                </div>
                <p class="text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                    Mendalami implementasi Agentic AI, Large Language Models (LLM), penalaran berbasis agen (Observe-Plan-Act), machine learning, dan integrasi kecerdasan buatan pada tools produktivitas.
                </p>
            </div>
        </div>
    </section>

    <!-- Study History & Key Courses -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold tracking-tight text-zinc-900 dark:text-white font-display">Riwayat Studi & Mata Kuliah Unggulan</h2>
                <p class="text-xs text-zinc-500 dark:text-zinc-400 font-mono mt-0.5">Rekam jejak perkuliahan di Teknik Informatika ITS</p>
            </div>
            <span class="tag-pill">6 Mata Kuliah</span>
        </div>

        <div class="overflow-hidden rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-950/60 font-mono text-[11px] text-zinc-500 uppercase tracking-wider">
                            <th class="py-3 px-4">Kode MK</th>
                            <th class="py-3 px-4">Nama Mata Kuliah</th>
                            <th class="py-3 px-4">Beban SKS</th>
                            <th class="py-3 px-4">Nilai Mutu</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 font-sans">
                        @foreach ($profile['courses'] as $course)
                        <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30 transition-colors">
                            <td class="py-3 px-4 font-mono text-zinc-500">{{ $course['code'] }}</td>
                            <td class="py-3 px-4 font-semibold text-zinc-900 dark:text-white">{{ $course['name'] }}</td>
                            <td class="py-3 px-4 font-mono text-zinc-600 dark:text-zinc-300">{{ $course['sks'] }} SKS</td>
                            <td class="py-3 px-4 font-mono font-bold text-emerald-600 dark:text-emerald-400">{{ $course['grade'] }}</td>
                            <td class="py-3 px-4">
                                <span class="inline-flex items-center gap-1 rounded-full px-2 py-0.5 font-mono text-[10px] {{ $course['status'] === 'Lulus' ? 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20' : 'bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20' }}">
                                    {{ $course['status'] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Challenge 1: Regex Parameter Verification Box -->
    <section class="mx-auto max-w-5xl px-6 py-6 pb-20">
        <div class="rounded-xl border border-blue-500/30 bg-blue-50/40 dark:bg-blue-950/20 p-6">
            <div class="flex items-start gap-4">
                <div class="glow-tile !w-10 !h-10 !rounded-lg border border-blue-500/30 shrink-0">
                    <svg class="w-5 h-5 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <span class="font-mono text-xs font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">
                        Tantangan 1: Pengamanan Parameter (Regex) Teruji
                    </span>
                    <h3 class="mt-1 text-base font-bold text-zinc-900 dark:text-white">
                        Route::get('/mahasiswa/{nrp}')->where('nrp', '[0-9]{10}')
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Rute ini hanya mengizinkan input persis 10 digit numerik. Coba navigasi cepat di bawah untuk membuktikan keamanan rute:
                    </p>

                    <div class="mt-4 flex flex-wrap items-center gap-2 text-xs font-mono">
                        <a href="{{ route('mahasiswa.show', ['nrp' => '5025241016']) }}" class="rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 dark:text-emerald-400 px-3 py-1.5 hover:bg-emerald-500/20 transition-colors">
                            &check; Valid (5025241016 - 10 digit)
                        </a>
                        <a href="{{ url('/mahasiswa/502524101') }}" class="rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-600 dark:text-rose-400 px-3 py-1.5 hover:bg-rose-500/20 transition-colors">
                            &times; Invalid 9 digit (akan 404)
                        </a>
                        <a href="{{ url('/mahasiswa/informatika') }}" class="rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-600 dark:text-rose-400 px-3 py-1.5 hover:bg-rose-500/20 transition-colors">
                            &times; Invalid huruf (akan 404)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
