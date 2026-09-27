@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
<div class="relative">

    <section class="mx-auto max-w-4xl px-6 py-20 sm:py-28 text-center flex flex-col items-center">
        
        <div class="glow-tile !w-20 !h-20 !rounded-2xl border border-rose-500/30 mb-6" style="--glow-color: #f43f5e">
            <svg class="w-10 h-10 text-rose-500 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>

        <div class="inline-flex items-center gap-2 rounded-full border border-rose-500/30 bg-rose-500/10 px-3 py-1 font-mono text-xs font-semibold text-rose-600 dark:text-rose-400 mb-5">
            <span>404 &bull; ROUTE NOT FOUND</span>
        </div>

        <h1 class="text-4xl font-semibold leading-tight tracking-tight text-zinc-900 dark:text-white sm:text-5xl font-display max-w-2xl">
            Rute ini tidak ditemukan di <br class="hidden sm:inline">
            <span class="gradient-text font-bold">Peta Sandbox Akademis</span>.
        </h1>

        <p class="mt-4 max-w-lg text-sm sm:text-base leading-relaxed text-zinc-600 dark:text-zinc-400">
            URL yang Anda tuju belum terdaftar pada routing sandbox atau parameter tidak memenuhi aturan validasi regex. Rute ditangani dengan aman melalui <code class="rounded bg-rose-100 dark:bg-rose-950/40 px-1.5 py-0.5 font-mono text-xs text-rose-800 dark:text-rose-300 font-semibold">Route::fallback()</code>.
        </p>

        <!-- Suggested Valid Routes -->
        <div class="mt-8 w-full max-w-md rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 p-5 text-left">
            <span class="font-mono text-[11px] uppercase tracking-wider text-zinc-500 font-semibold block mb-3">
                Rekomendasi Rute Aktif:
            </span>
            <div class="space-y-2 font-mono text-xs">
                <a href="{{ route('home') }}" class="flex items-center justify-between text-zinc-700 dark:text-zinc-300 hover:text-blue-500 transition-colors">
                    <span>&bull; Beranda (/)</span>
                    <span class="text-zinc-400">&rarr;</span>
                </a>
                <a href="{{ route('mahasiswa.show', ['nrp' => '5025241016']) }}" class="flex items-center justify-between text-zinc-700 dark:text-zinc-300 hover:text-blue-500 transition-colors">
                    <span>&bull; Profil NRP Valid (/mahasiswa/5025241016)</span>
                    <span class="text-zinc-400">&rarr;</span>
                </a>
                <a href="{{ route('agent.show') }}" class="flex items-center justify-between text-zinc-700 dark:text-zinc-300 hover:text-purple-500 transition-colors">
                    <span>&bull; Platform Agentic AI (/agent)</span>
                    <span class="text-zinc-400">&rarr;</span>
                </a>
                <a href="{{ route('ipk.calculate', ['ip1' => '3.80', 'ip2' => '3.95']) }}" class="flex items-center justify-between text-zinc-700 dark:text-zinc-300 hover:text-emerald-500 transition-colors">
                    <span>&bull; Kalkulator IPK (/hitung-ipk/3.80/3.95)</span>
                    <span class="text-zinc-400">&rarr;</span>
                </a>
                <a href="{{ route('dashboard.index') }}" class="flex items-center justify-between text-zinc-700 dark:text-zinc-300 hover:text-amber-500 transition-colors">
                    <span>&bull; Prefix Dashboard (/dashboard)</span>
                    <span class="text-zinc-400">&rarr;</span>
                </a>
            </div>
        </div>

        <div class="mt-8 flex items-center gap-3">
            <a href="{{ route('home') }}" class="btn-primary-gloss">
                <span>&larr; Kembali ke Beranda</span>
            </a>
        </div>

    </section>

</div>
@endsection
