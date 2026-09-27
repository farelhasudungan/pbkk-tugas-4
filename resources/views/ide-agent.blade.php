@extends('layouts.app')

@section('title', 'Ide Platform Agentic AI & Pengumpulan Riset - PBKK')

@section('content')
@php
    // =========================================================================
    // TANTANGAN 1: TOGGLE TEMA DINAMIS VIA VARIABEL BLADE PHP
    // =========================================================================
    // Terapkan class dynamic CSS Tailwind menggunakan variabel Blade PHP untuk
    // mengubah latar belakang halaman menjadi mode gelap (*dark mode*) berdasarkan
    // parameter rute /ide-agent?mode=dark.
    // Juga mendukung pengujian mode terang/putih (/ide-agent?mode=light atau ?mode=white).
    // =========================================================================
    $routeMode = request()->query('mode', $mode ?? null);
    $routeModeLower = $routeMode ? strtolower(trim($routeMode)) : null;

    $isDarkExplicit = ($routeModeLower === 'dark');
    $isLightExplicit = in_array($routeModeLower, ['light', 'white', 'terang']);

    // Variabel kelas Tailwind dinamis Blade PHP
    $dynamicThemeContainer = $isDarkExplicit
        ? 'bg-[#09090d] text-zinc-100 ring-1 ring-purple-500/20 shadow-2xl'
        : ($isLightExplicit
            ? 'bg-zinc-50 text-zinc-900 ring-1 ring-zinc-200 shadow-sm'
            : 'text-zinc-900 dark:text-zinc-100');

    $dynamicCardClass = $isDarkExplicit
        ? 'bg-zinc-900/95 border-zinc-800 text-zinc-100 shadow-lg shadow-purple-500/5'
        : ($isLightExplicit
            ? 'bg-white border-zinc-200 text-zinc-900 shadow-sm'
            : 'bg-white dark:bg-zinc-900/70 border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 shadow-xs');

    $dynamicSubCardClass = $isDarkExplicit
        ? 'bg-zinc-950/80 border-zinc-800 text-zinc-100'
        : ($isLightExplicit
            ? 'bg-zinc-50 border-zinc-200 text-zinc-900'
            : 'bg-zinc-50 dark:bg-zinc-950/50 border-zinc-200/80 dark:border-zinc-800/80 text-zinc-900 dark:text-zinc-100');

    $dynamicInputClass = $isDarkExplicit
        ? 'bg-zinc-950 border-zinc-700 text-zinc-100 placeholder-zinc-500 focus:border-purple-500 focus:ring-purple-500/30'
        : ($isLightExplicit
            ? 'bg-white border-zinc-300 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:ring-blue-500/30'
            : 'bg-white dark:bg-zinc-950 border-zinc-300 dark:border-zinc-700 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 focus:border-blue-500 dark:focus:border-purple-500');

    $headingTextColor = $isDarkExplicit
        ? 'text-white'
        : ($isLightExplicit
            ? 'text-zinc-900'
            : 'text-zinc-900 dark:text-white');

    $bodyTextColor = $isDarkExplicit
        ? 'text-zinc-300'
        : ($isLightExplicit
            ? 'text-zinc-600'
            : 'text-zinc-600 dark:text-zinc-400');
@endphp

<div class="relative {{ $dynamicThemeContainer }} transition-all duration-300">

    {{-- Tantangan 1: Indikator & Quick Toggle Bar --}}
    <section class="mx-auto max-w-5xl px-6 pt-8 pb-2">
        <div class="rounded-2xl border p-4 sm:p-5 transition-all {{ $isDarkExplicit ? 'border-purple-500/40 bg-purple-950/25 text-purple-200' : ($isLightExplicit ? 'border-amber-500/30 bg-amber-50/80 text-amber-900' : 'border-zinc-200 dark:border-zinc-800 bg-white/70 dark:bg-zinc-900/40') }}">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="flex size-8 items-center justify-center rounded-xl {{ $isDarkExplicit ? 'bg-purple-500 text-white animate-pulse' : ($isLightExplicit ? 'bg-amber-500 text-white' : 'bg-blue-500/10 text-blue-600 dark:text-blue-400') }} font-mono text-xs font-bold shrink-0">
                        @if ($isDarkExplicit)
                            &#9790;
                        @elseif ($isLightExplicit)
                            &#9728;
                        @else
                            &#9881;
                        @endif
                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="text-sm font-bold font-display {{ $isDarkExplicit ? 'text-purple-300' : ($isLightExplicit ? 'text-amber-950 font-extrabold' : 'text-zinc-900 dark:text-white') }}">
                                Tantangan 1: Toggle Tema Dinamis (CPMK-1 Challenge)
                            </h4>
                            @if ($isDarkExplicit)
                                <span class="rounded-full bg-purple-500/20 border border-purple-500/40 px-2 py-0.5 text-[10px] font-mono text-purple-300 font-bold uppercase">
                                    Dark Mode Aktif via ?mode=dark
                                </span>
                            @elseif ($isLightExplicit)
                                <span class="rounded-full bg-amber-500/20 border border-amber-500/40 px-2 py-0.5 text-[10px] font-mono text-amber-800 font-bold uppercase">
                                    White/Light Mode Aktif via ?mode={{ $routeModeLower }}
                                </span>
                            @else
                                <span class="rounded-full bg-zinc-200 dark:bg-zinc-800 px-2 py-0.5 text-[10px] font-mono text-zinc-600 dark:text-zinc-400">
                                    Mode Standar (Sesuai Preferensi)
                                </span>
                            @endif
                        </div>
                        <p class="text-xs {{ $isLightExplicit ? 'text-amber-900/80 font-medium' : 'text-zinc-500 dark:text-zinc-400' }} mt-0.5">
                            Status variabel Blade: <code class="font-mono {{ $isLightExplicit ? 'text-amber-950 font-bold bg-amber-100/80' : 'text-blue-600 dark:text-purple-400' }} px-1 py-0.2 rounded">$mode = "{{ $routeModeLower ?? 'null' }}"</code>. Menerapkan kelas Tailwind dinamis secara instan ke wrapper, kartu, dan teks.
                        </p>
                    </div>
                </div>

                {{-- Interactive Switcher Buttons for Tantangan 1 --}}
                <div class="flex flex-wrap items-center gap-2 font-mono text-xs">
                    <a href="{{ route('ide-agent', ['mode' => 'dark']) }}" 
                       class="rounded-lg px-3 py-1.5 transition-all {{ $isDarkExplicit ? 'bg-purple-600 text-white font-bold ring-2 ring-purple-400 shadow-xs' : 'bg-zinc-100 dark:bg-zinc-800 hover:bg-purple-600/20 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700' }}">
                        &bull; Mode Gelap (?mode=dark)
                    </a>
                    <a href="{{ route('ide-agent', ['mode' => 'white']) }}" 
                       class="rounded-lg px-3 py-1.5 transition-all {{ $isLightExplicit ? 'bg-amber-600 text-white font-bold ring-2 ring-amber-400 shadow-xs' : 'bg-zinc-100 dark:bg-zinc-800 hover:bg-amber-500/20 text-zinc-700 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700' }}">
                        &bull; Mode Putih (?mode=white)
                    </a>
                    <a href="{{ route('ide-agent') }}" 
                       class="rounded-lg px-2.5 py-1.5 bg-zinc-200/80 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                        Reset
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Banner Notifikasi Form Sukses (Komponen <x-status-banner>) --}}
    @if (session('success') && $submittedIdea)
        <section class="mx-auto max-w-5xl px-6 pt-4">
            <x-status-banner type="success" title="Notifikasi Form: Usulan Ide Berhasil Terkirim!" dismissible="true">
                <div class="space-y-2">
                    <p>
                        Terima kasih, <strong class="font-bold text-emerald-800 dark:text-emerald-300">{{ $submittedIdea['author_name'] }}</strong> ({{ $submittedIdea['author_email'] }}). Usulan rancangan ide Anda telah dicatat oleh sistem platform:
                    </p>
                    <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 p-3 font-mono text-xs text-emerald-900 dark:text-emerald-200">
                        <div><strong>Kategori:</strong> {{ $submittedIdea['agent_category'] }}</div>
                        <div class="mt-1"><strong>Judul:</strong> {{ $submittedIdea['idea_title'] }}</div>
                        <div class="mt-1"><strong>Deskripsi:</strong> {{ $submittedIdea['idea_description'] }}</div>
                    </div>
                </div>
            </x-status-banner>
        </section>
    @endif

    {{-- Banner Validasi Error jika ada input yang salah --}}
    @if ($errors->any())
        <section class="mx-auto max-w-5xl px-6 pt-4">
            <x-status-banner type="warning" title="Perhatian: Formulir Memerlukan Perbaikan" dismissible="true">
                <ul class="list-disc list-inside space-y-1 font-mono text-xs">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-status-banner>
        </section>
    @endif

    {{-- Header Section --}}
    <section class="mx-auto max-w-5xl px-6 pt-8 pb-6 sm:pt-10">
        <div class="mb-4 flex flex-wrap items-center gap-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-purple-500/30 bg-purple-500/10 px-3 py-1 font-mono text-xs font-medium text-purple-600 dark:text-purple-400">
                <span class="size-2 rounded-full bg-purple-500"></span>
                <span>GET & POST /ide-agent</span>
            </div>
            <span class="font-mono text-xs text-zinc-500 dark:text-zinc-400 bg-zinc-200/60 dark:bg-zinc-800/60 px-2.5 py-0.5 rounded-full border border-zinc-300 dark:border-zinc-700">
                Platform Agentic AI & Pengumpulan Ide PBKK
            </span>
        </div>

        <h1 class="max-w-4xl text-3xl font-semibold leading-[1.08] tracking-tight {{ $headingTextColor }} sm:text-4xl lg:text-5xl font-display">
            Ide Platform Agentic AI: <br class="hidden sm:inline">
            <span class="gradient-text font-bold">TalentMatch & Autonomous Recruiting Agent</span>
        </h1>

        <p class="mt-4 max-w-3xl text-base sm:text-lg leading-relaxed {{ $bodyTextColor }}">
            Visualisasi rancangan platform Agentic AI kelompok mahasiswa ITS untuk mentransformasi pipeline rekrutmen talenta. Menggantikan proses screening manual HR yang repetitif melalui pipeline otonom: 
            <span class="font-semibold {{ $headingTextColor }}">ingest berkas & form &rarr; LLM parsing kecocokan &rarr; kalkulasi ranking kandidat &rarr; otomatisasi pengiriman feedback/undangan via Queue Mailer</span>.
        </p>

        {{-- Meta Badges --}}
        <div class="mt-6 grid gap-3 text-xs font-mono sm:grid-cols-3">
            <div class="rounded-xl border p-4 {{ $dynamicCardClass }}">
                <span class="block text-zinc-500 dark:text-zinc-400 font-semibold">Target Pengguna</span>
                <span class="mt-1 block font-bold {{ $headingTextColor }}">HR & Talent Acquisition Team</span>
            </div>
            <div class="rounded-xl border p-4 {{ $dynamicCardClass }}">
                <span class="block text-zinc-500 dark:text-zinc-400 font-semibold">Model Agen</span>
                <span class="mt-1 block font-bold {{ $headingTextColor }}">Autonomous Multi-Step Pipeline</span>
            </div>
            <div class="rounded-xl border p-4 {{ $dynamicCardClass }}">
                <span class="block text-zinc-500 dark:text-zinc-400 font-semibold">Komponen Notifikasi</span>
                <span class="mt-1 block font-bold {{ $headingTextColor }}">&lt;x-status-banner&gt; Form Active</span>
            </div>
        </div>
    </section>

    {{-- Masalah & Solusi Arsitektur --}}
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="grid gap-5 lg:grid-cols-2">
            
            {{-- Masalah --}}
            <div class="rounded-2xl border border-rose-500/25 bg-rose-50/70 p-6 sm:p-7 dark:bg-rose-950/20">
                <span class="font-mono text-xs font-semibold uppercase tracking-wider text-rose-600 dark:text-rose-400">
                    Masalah Operasional Rekrutmen
                </span>
                <h3 class="mt-2 text-xl font-bold tracking-tight text-zinc-900 dark:text-white font-display">
                    Screening manual memakan ratusan jam, rawan bias, & 80% pelamar ter-ghosting.
                </h3>
                <p class="mt-3 text-xs sm:text-sm leading-relaxed text-zinc-600 dark:text-zinc-300">
                    Tim rekruter harus memeriksa ribuan CV dan portofolio secara manual. Beban kerja tinggi menyebabkan penilaian tidak objektif, response time berminggu-minggu, serta kelelahan tim HR yang menurunkan kualitas talent acquisition.
                </p>
                <div class="mt-4 pt-4 border-t border-rose-500/20 font-mono text-xs text-rose-700 dark:text-rose-300">
                    &bull; Dampak: Inefisiensi biaya operasional & hilangnya kandidat unggulan.
                </div>
            </div>

            {{-- Solusi Agentic AI --}}
            <div class="rounded-2xl border border-blue-500/25 bg-blue-50/80 p-6 sm:p-7 dark:bg-blue-950/30">
                <span class="font-mono text-xs font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">
                    Solusi Agentic AI (TalentMatch)
                </span>
                <h3 class="mt-2 text-xl font-bold tracking-tight text-zinc-900 dark:text-white font-display">
                    Agen cerdas mengurai CV, mengkalkulasi ranking, & mengeksekusi feedback otomatis.
                </h3>
                <p class="mt-3 text-xs sm:text-sm leading-relaxed text-zinc-600 dark:text-zinc-300">
                    Agen otonom memproses formulir lamaran secara real-time. Model mengekstrak skill dan pengalaman kerja, menghitung kesesuaian dengan rubrik posisi, lalu mengirim notifikasi hasil dan jadwal wawancara tanpa jeda waktu.
                </p>
                <div class="mt-4 pt-4 border-t border-blue-500/20 font-mono text-xs text-blue-700 dark:text-blue-300">
                    &bull; Keunggulan: Transparansi 100%, anti-bias, dan zero ghosting bagi pelamar.
                </div>
            </div>

        </div>
    </section>

    {{-- Diagram 4 Alur Kerja Pipeline Agen --}}
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="rounded-2xl border p-6 sm:p-8 {{ $dynamicCardClass }}">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h3 class="text-lg font-bold font-display {{ $headingTextColor }}">
                        Alur Kerja Otonom Agentic AI
                    </h3>
                    <p class="text-xs {{ $bodyTextColor }} mt-0.5">
                        Pipeline 4 langkah dari intake berkas hingga keputusan otomatis.
                    </p>
                </div>
                <span class="font-mono text-xs text-purple-600 dark:text-purple-400 bg-purple-500/10 px-3 py-1 rounded-full border border-purple-500/20">
                    Autonomous State Machine
                </span>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 font-mono text-xs">
                <div class="rounded-xl border p-4 {{ $dynamicSubCardClass }}">
                    <span class="inline-flex size-6 items-center justify-center rounded-lg bg-blue-500/10 text-blue-600 dark:text-blue-400 font-bold mb-2">1</span>
                    <h4 class="font-bold font-sans text-sm {{ $headingTextColor }}">Form & Document Intake</h4>
                    <p class="mt-1 text-zinc-600 dark:text-zinc-400 text-[11px] leading-relaxed">
                        Menerima berkas CV (PDF/DOCX) dan jawaban formulir seleksi kandidat secara otomatis.
                    </p>
                </div>

                <div class="rounded-xl border p-4 {{ $dynamicSubCardClass }}">
                    <span class="inline-flex size-6 items-center justify-center rounded-lg bg-purple-500/10 text-purple-600 dark:text-purple-400 font-bold mb-2">2</span>
                    <h4 class="font-bold font-sans text-sm {{ $headingTextColor }}">LLM Matching Engine</h4>
                    <p class="mt-1 text-zinc-600 dark:text-zinc-400 text-[11px] leading-relaxed">
                        Agen menganalisis profil keahlian kandidat terhadap spesifikasi kompetensi pekerjaan.
                    </p>
                </div>

                <div class="rounded-xl border p-4 {{ $dynamicSubCardClass }}">
                    <span class="inline-flex size-6 items-center justify-center rounded-lg bg-amber-500/10 text-amber-600 dark:text-amber-400 font-bold mb-2">3</span>
                    <h4 class="font-bold font-sans text-sm {{ $headingTextColor }}">Scoring & Ranking</h4>
                    <p class="mt-1 text-zinc-600 dark:text-zinc-400 text-[11px] leading-relaxed">
                        Menghitung skor probabilitas kecocokan (0-100%) dan menyusun daftar rekomendasi talenta.
                    </p>
                </div>

                <div class="rounded-xl border p-4 {{ $dynamicSubCardClass }}">
                    <span class="inline-flex size-6 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-bold mb-2">4</span>
                    <h4 class="font-bold font-sans text-sm {{ $headingTextColor }}">Automated Mailer</h4>
                    <p class="mt-1 text-zinc-600 dark:text-zinc-400 text-[11px] leading-relaxed">
                        Mengirim surat keputusan terformat ramah, link penjadwalan, atau feedback personal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Formulir Pengumpulan Ide Platform Agentic AI --}}
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="rounded-2xl border p-6 sm:p-8 {{ $dynamicCardClass }}">
            <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-5 border-b border-zinc-200 dark:border-zinc-800">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="flex size-7 items-center justify-center rounded-lg bg-blue-500/10 text-blue-600 dark:text-blue-400">
                            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </span>
                        <h3 class="text-xl font-bold font-display {{ $headingTextColor }}">
                            Formulir Pengumpulan Ide Platform Agentic AI
                        </h3>
                    </div>
                    <p class="text-xs {{ $bodyTextColor }} mt-1">
                        Sampaikan usulan ide pengembangan fitur, agen otonom baru, atau feedback arsitektur untuk proyek kelompok PBKK.
                    </p>
                </div>
                <span class="font-mono text-xs text-zinc-600 dark:text-zinc-400 bg-zinc-100 dark:bg-zinc-800/80 px-3 py-1 rounded-lg border border-zinc-200 dark:border-zinc-700">
                    Form Validation & Session Flash
                </span>
            </div>

            <form action="{{ route('ide-agent.submit', array_filter(['mode' => $routeModeLower])) }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid gap-5 sm:grid-cols-2">
                    {{-- Nama Pengusul --}}
                    <div>
                        <label for="author_name" class="block font-mono text-xs font-semibold text-zinc-800 dark:text-zinc-200 mb-1.5">
                            Nama Lengkap Pengusul <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="author_name" 
                               id="author_name" 
                               value="{{ old('author_name', $profile['name']) }}"
                               placeholder="Contoh: Farrel Limbong" 
                               required
                               class="w-full rounded-xl px-3.5 py-2.5 text-sm transition-all focus:outline-hidden {{ $dynamicInputClass }}">
                        @error('author_name')
                            <p class="mt-1 font-mono text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email Pengusul --}}
                    <div>
                        <label for="author_email" class="block font-mono text-xs font-semibold text-zinc-800 dark:text-zinc-200 mb-1.5">
                            Surel / Email Mahasiswa <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" 
                               name="author_email" 
                               id="author_email" 
                               value="{{ old('author_email', $profile['email']) }}"
                               placeholder="5025241016@student.its.ac.id" 
                               required
                               class="w-full rounded-xl px-3.5 py-2.5 text-sm transition-all focus:outline-hidden {{ $dynamicInputClass }}">
                        @error('author_email')
                            <p class="mt-1 font-mono text-xs text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Kategori Agen --}}
                <div>
                    <label for="agent_category" class="block font-mono text-xs font-semibold text-zinc-800 dark:text-zinc-200 mb-1.5">
                        Kategori Platform / Agen <span class="text-rose-500">*</span>
                    </label>
                    <select name="agent_category" 
                            id="agent_category" 
                            required
                            class="w-full rounded-xl px-3.5 py-2.5 text-sm transition-all focus:outline-hidden {{ $dynamicInputClass }}">
                        <option value="Autonomous Recruiting & Talent Screener" {{ old('agent_category') === 'Autonomous Recruiting & Talent Screener' ? 'selected' : '' }}>
                            Autonomous Recruiting & Talent Screener (Proyek Utama)
                        </option>
                        <option value="Academic Research Paper Assistant" {{ old('agent_category') === 'Academic Research Paper Assistant' ? 'selected' : '' }}>
                            Academic Research Paper Assistant (Asisten Riset)
                        </option>
                        <option value="Automated Code Reviewer & CI/CD Guard" {{ old('agent_category') === 'Automated Code Reviewer & CI/CD Guard' ? 'selected' : '' }}>
                            Automated Code Reviewer & CI/CD Guard (Rekayasa Software)
                        </option>
                        <option value="Student Advising & FRS Advisor Agent" {{ old('agent_category') === 'Student Advising & FRS Advisor Agent' ? 'selected' : '' }}>
                            Student Advising & FRS Advisor Agent (Sistem Akademik ITS)
                        </option>
                    </select>
                    @error('agent_category')
                        <p class="mt-1 font-mono text-xs text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Judul Ide Inovasi --}}
                <div>
                    <label for="idea_title" class="block font-mono text-xs font-semibold text-zinc-800 dark:text-zinc-200 mb-1.5">
                        Judul Usulan Ide Inovasi <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="idea_title" 
                           id="idea_title" 
                           value="{{ old('idea_title') }}"
                           placeholder="Contoh: Integrasi Semantic Matching CV dengan Senopati LLM ITS" 
                           required
                           class="w-full rounded-xl px-3.5 py-2.5 text-sm transition-all focus:outline-hidden {{ $dynamicInputClass }}">
                    @error('idea_title')
                        <p class="mt-1 font-mono text-xs text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi Ide --}}
                <div>
                    <label for="idea_description" class="block font-mono text-xs font-semibold text-zinc-800 dark:text-zinc-200 mb-1.5">
                        Deskripsi Rancangan Fitur & Alur Kerja <span class="text-rose-500">*</span>
                    </label>
                    <textarea name="idea_description" 
                              id="idea_description" 
                              rows="4" 
                              required
                              placeholder="Uraikan rancangan mekanisme kerja agen, integrasi data, dan output yang dihasilkan..."
                              class="w-full rounded-xl px-3.5 py-2.5 text-sm transition-all focus:outline-hidden {{ $dynamicInputClass }}">{{ old('idea_description') }}</textarea>
                    @error('idea_description')
                        <p class="mt-1 font-mono text-xs text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit Form --}}
                <div class="flex items-center justify-between pt-2">
                    <span class="font-mono text-xs text-zinc-500">
                        * Data akan diverifikasi secara lokal dan memicu notifikasi banner status.
                    </span>

                    <button type="submit" class="btn-primary-gloss">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span>Kirim Usulan Ide Agentic AI</span>
                    </button>
                </div>
            </form>
        </div>
    </section>

</div>
@endsection
