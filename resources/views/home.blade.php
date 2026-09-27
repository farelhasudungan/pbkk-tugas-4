@extends('layouts.app')

@section('title', 'Beranda Profil Akademik ITS')

@section('content')
<div class="relative">

    {{-- Tantangan 2: Alert Status Interaktif --}}
    {{-- Memeriksa parameter URL user (?user=Nama atau /beranda?user=Andi) --}}
    @if ($userName)
        <section class="mx-auto max-w-5xl px-6 pt-6">
            <x-status-banner type="info" title="Pesan Selamat Datang Interaktif (CPMK-1 Challenge)" dismissible="true">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        Halo, <strong class="font-bold text-blue-600 dark:text-blue-400 font-mono text-sm underline decoration-blue-500/40 underline-offset-2">{{ $userName }}</strong>!
                        Selamat datang di mini-website akademik pribadi milik <strong class="text-zinc-900 dark:text-white">Farrel Hasudungan Immanuel Limbong</strong> (NRP: <code class="font-mono font-bold text-xs bg-blue-100 dark:bg-blue-900/40 px-1.5 py-0.5 rounded text-blue-700 dark:text-blue-300">5025241016</code>). Notifikasi ini berhasil terpicu secara dinamis melalui parameter rute <code class="font-mono text-xs bg-zinc-200/70 dark:bg-zinc-800 px-1.5 py-0.5 rounded">?user={{ $userName }}</code>.
                    </div>
                    <a href="{{ route('home') }}" class="inline-flex shrink-0 items-center gap-1 text-xs font-mono text-blue-600 dark:text-blue-400 hover:underline">
                        <span>Reset Parameter</span> &times;
                    </a>
                </div>
            </x-status-banner>
        </section>
    @endif

    {{-- Hero Section --}}
    <section class="mx-auto max-w-5xl px-6 pt-10 pb-8 sm:pt-14">
        
        {{-- Tag Status Vivat ITS --}}
        <div class="inline-flex items-center gap-2 rounded-full border border-blue-500/30 bg-blue-500/10 px-3 py-1 font-mono text-xs font-medium text-blue-600 dark:text-blue-400 mb-5">
            <span class="relative flex size-2">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex size-2 rounded-full bg-blue-500"></span>
            </span>
            <span>Vivat ITS! Ruang Akademis & Sandbox Profil Farrel Limbong</span>
        </div>

        <h1 class="text-4xl font-semibold leading-[1.08] tracking-tight sm:text-5xl lg:text-6xl text-zinc-900 dark:text-white font-display">
            Aplikasi Multi-View <br class="hidden sm:inline">
            <span class="gradient-text font-bold">Profil Akademik & Agentic AI</span>
        </h1>

        <p class="mt-5 max-w-3xl text-base sm:text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
            Selamat datang di portal akademik mandiri milik <span class="font-semibold text-zinc-900 dark:text-white">{{ $profile['name'] }}</span> (NRP: <code class="rounded bg-blue-100 dark:bg-blue-900/40 px-1.5 py-0.5 font-mono text-xs font-bold text-blue-700 dark:text-blue-300">{{ $profile['nrp'] }}</code>), mahasiswa <span class="font-medium text-zinc-900 dark:text-white">{{ $profile['program'] }}</span>, <span class="font-medium text-zinc-900 dark:text-white">{{ $profile['faculty_short'] }} ITS</span>.
            Seluruh halaman dikelola oleh satu file master layout utama (<code class="font-mono text-xs text-blue-600 dark:text-blue-400">layouts/app.blade.php</code>) dan satu controller (<code class="font-mono text-xs text-blue-600 dark:text-blue-400">PageController</code>) dengan compiler aset lokal Vite.
        </p>

        {{-- Interactive CTA Buttons --}}
        <div class="mt-7 flex flex-wrap items-center gap-3">
            <a href="{{ route('profile') }}" class="btn-primary-gloss">
                <span>Buka Profil Mahasiswa</span>
                <svg class="size-4 text-blue-100 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>

            <a href="{{ route('ide-agent') }}" class="btn-secondary-gloss">
                <span>Visualisasi Ide Agentic AI</span>
            </a>

            <a href="{{ route('ide-agent', ['mode' => 'dark']) }}" class="inline-flex items-center gap-1.5 px-4 py-2 font-mono text-xs text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 transition-colors">
                <span>Tes Mode Gelap (?mode=dark) &rarr;</span>
            </a>
        </div>

        {{-- Testing Presets Bar for Tantangan 2 --}}
        <div class="mt-8 rounded-xl border border-zinc-200/90 dark:border-zinc-800/90 bg-zinc-100/60 dark:bg-zinc-900/40 p-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <span class="size-2 rounded-full bg-blue-500"></span>
                    <span class="font-mono text-xs font-semibold text-zinc-700 dark:text-zinc-300">
                        Uji Tantangan 2 (Alert Parameter ?user=...):
                    </span>
                </div>
                <div class="flex flex-wrap items-center gap-2 font-mono text-xs">
                    <a href="{{ url('/beranda?user=Andi') }}" 
                       class="rounded-lg px-2.5 py-1 transition-all {{ $userName === 'Andi' ? 'bg-blue-600 text-white font-bold' : 'bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-blue-400' }}">
                        ?user=Andi
                    </a>
                    <a href="{{ url('/beranda?user=Budi') }}" 
                       class="rounded-lg px-2.5 py-1 transition-all {{ $userName === 'Budi' ? 'bg-blue-600 text-white font-bold' : 'bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-blue-400' }}">
                        ?user=Budi
                    </a>
                    <a href="{{ url('/beranda?user=Dosen-Penguji-PBKK') }}" 
                       class="rounded-lg px-2.5 py-1 transition-all {{ $userName === 'Dosen-Penguji-PBKK' ? 'bg-blue-600 text-white font-bold' : 'bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-blue-400' }}">
                        ?user=Dosen-Penguji-PBKK
                    </a>
                    <a href="{{ route('home') }}" 
                       class="rounded-lg px-2.5 py-1 bg-zinc-200 dark:bg-zinc-800 text-zinc-500 hover:text-zinc-900 dark:hover:text-white">
                        Reset
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Portal Navigasi Multi-View (3 Fitur Utama Tanpa Duplikasi Profil) --}}
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="mb-6 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-xl font-bold tracking-tight text-zinc-900 dark:text-white font-display">
                    Navigasi Fitur & Modul Aplikasi
                </h2>
                <p class="text-xs text-zinc-500 dark:text-zinc-400 font-mono mt-0.5">
                    Struktur Multi-View Berbasis Pewarisan Master Layout
                </p>
            </div>
            <span class="tag-pill w-fit">Tugas 4 PBKK</span>
        </div>

        <div class="grid gap-6 sm:grid-cols-3">
            
            {{-- Modul 1: Profil Mahasiswa --}}
            <a href="{{ route('profile') }}" 
               class="group relative overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs transition-all duration-200 hover:border-blue-500/50 hover:shadow-lg dark:hover:shadow-blue-500/5 flex flex-col justify-between">
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div class="glow-tile !w-12 !h-12 !rounded-xl border border-blue-500/30 shrink-0">
                            <svg class="size-6 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <span class="font-mono text-[10px] text-blue-600 dark:text-blue-400 bg-blue-500/10 border border-blue-500/20 px-2.5 py-0.5 rounded-full font-semibold">
                            Rute 2: /profil-mahasiswa
                        </span>
                    </div>

                    <h3 class="text-base font-bold text-zinc-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors font-display">
                        Profil Mahasiswa ITS
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Menampilkan KTM digital, capaian IPK kumulatif 3.88, dosen wali, laboratorium riset, serta riwayat mata kuliah dengan 6 komponen kustom <code class="font-mono text-blue-600 dark:text-blue-400">&lt;x-info-card&gt;</code>.
                    </p>
                </div>

                <div class="mt-5 pt-3 border-t border-zinc-100 dark:border-zinc-800/80 flex items-center justify-between text-xs font-mono text-zinc-500">
                    <span>Buka Profil Mahasiswa</span>
                    <span class="text-blue-500 group-hover:translate-x-0.5 transition-transform">&rarr;</span>
                </div>
            </a>

            {{-- Modul 2: Ide-Riset Agentic AI --}}
            <a href="{{ route('ide-agent') }}" 
               class="group relative overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs transition-all duration-200 hover:border-purple-500/50 hover:shadow-lg dark:hover:shadow-purple-500/5 flex flex-col justify-between">
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div class="glow-tile !w-12 !h-12 !rounded-xl border border-purple-500/30 shrink-0" style="--glow-color: #a855f7">
                            <svg class="size-6 text-purple-500 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="font-mono text-[10px] text-purple-600 dark:text-purple-400 bg-purple-500/10 border border-purple-500/20 px-2.5 py-0.5 rounded-full font-semibold">
                            Rute 3: /ide-agent
                        </span>
                    </div>

                    <h3 class="text-base font-bold text-zinc-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors font-display">
                        Ide-Riset Agentic AI & Form
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Visualisasi platform <span class="font-semibold text-purple-600 dark:text-purple-400">TalentMatch AI</span>, 4 alur kerja autonomous recruiting pipeline, toggle dynamic theme (<code class="font-mono text-purple-600 dark:text-purple-400">?mode=dark</code>), dan form pengumpulan ide.
                    </p>
                </div>

                <div class="mt-5 pt-3 border-t border-zinc-100 dark:border-zinc-800/80 flex items-center justify-between text-xs font-mono text-zinc-500">
                    <span>Eksplorasi Ide & Form</span>
                    <span class="text-purple-500 group-hover:translate-x-0.5 transition-transform">&rarr;</span>
                </div>
            </a>

            {{-- Modul 3: Arsitektur Master Layout & Vite --}}
            <div class="relative overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs flex flex-col justify-between">
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div class="glow-tile !w-12 !h-12 !rounded-xl border border-emerald-500/30 shrink-0" style="--glow-color: #10b981">
                            <svg class="size-6 text-emerald-500 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <span class="font-mono text-[10px] text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-0.5 rounded-full font-semibold">
                            Arsitektur Teknis
                        </span>
                    </div>

                    <h3 class="text-base font-bold text-zinc-900 dark:text-white font-display">
                        Master Layout Terpusat
                    </h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Satu berkas master layout <code class="font-mono text-emerald-600 dark:text-emerald-400">layouts/app.blade.php</code> diwarisi oleh ketiga views tanpa duplikasi tag HTML dasar, didukung asset bundler lokal Vite.
                    </p>
                </div>

                <div class="mt-5 pt-3 border-t border-zinc-100 dark:border-zinc-800/80 flex items-center justify-between text-xs font-mono text-zinc-500">
                    <span>Single PageController</span>
                    <span class="text-emerald-500 font-bold">&check; Terverifikasi</span>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection
