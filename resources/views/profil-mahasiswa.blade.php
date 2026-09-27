@extends('layouts.app')

@section('title', 'Profil Mahasiswa - Farrel Hasudungan Immanuel Limbong')

@section('content')
<div class="relative">

    {{-- Header Section --}}
    <section class="mx-auto max-w-5xl px-6 pt-10 pb-6 sm:pt-14">
        <div class="mb-4 flex flex-wrap items-center gap-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-blue-500/30 bg-blue-500/10 px-3 py-1 font-mono text-xs font-medium text-blue-600 dark:text-blue-400">
                <span class="size-2 rounded-full bg-blue-500"></span>
                <span>GET /profil-mahasiswa</span>
            </div>
            <span class="font-mono text-xs text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-0.5 rounded-full">
                Single Controller: PageController@profile
            </span>
            <span class="font-mono text-xs text-purple-600 dark:text-purple-400 bg-purple-500/10 border border-purple-500/20 px-2.5 py-0.5 rounded-full">
                Reusable Component: &lt;x-info-card&gt;
            </span>
        </div>

        <h1 class="text-3xl font-semibold leading-[1.08] tracking-tight text-zinc-900 dark:text-white sm:text-4xl lg:text-5xl font-display">
            Profil Akademik <span class="gradient-text font-bold">Mahasiswa ITS</span>
        </h1>

        <p class="mt-4 max-w-3xl text-base sm:text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
            Data identitas resmi mahasiswa, status studi aktif, dan capaian akademik di lingkungan Institut Teknologi Sepuluh Nopember Surabaya. Halaman ini menggunakan komponen kustom <code class="font-mono text-xs text-blue-600 dark:text-blue-400">&lt;x-info-card&gt;</code> dengan dukungan atribut dan slot dinamis.
        </p>
    </section>

    {{-- KTM Digital Banner (Identitas Mahasiswa) --}}
    <section class="mx-auto max-w-5xl px-6 py-4">
        <div class="overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 shadow-xs">
            <div class="grid md:grid-cols-[0.9fr_1.3fr]">
                
                {{-- Banner Kiri Gradien Khas ITS --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 p-8 text-white flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-xs tracking-wider uppercase text-blue-200 font-semibold">ITS Student Identity</span>
                            <span class="inline-flex items-center gap-1 rounded-full bg-white/20 px-2.5 py-0.5 text-[11px] font-mono font-medium backdrop-blur-xs">
                                <span class="size-1.5 rounded-full bg-emerald-300"></span> Terverifikasi
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
                            <span>Status Akademik:</span>
                            <span class="font-semibold text-white">{{ $profile['status'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Surel Resmi:</span>
                            <span class="font-semibold text-white">{{ $profile['email'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Kampus:</span>
                            <span class="font-semibold text-white">{{ $profile['campus'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan Ringkasan Cepat --}}
                <div class="p-8 flex flex-col justify-between">
                    <div>
                        <h3 class="font-mono text-xs uppercase tracking-wider text-zinc-500 font-semibold mb-4">
                            Ringkasan Biodata Mahasiswa
                        </h3>

                        <dl class="grid gap-x-6 gap-y-5 sm:grid-cols-2">
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Program Studi</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['program'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Fakultas</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['faculty_short'] }} ITS</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Perguruan Tinggi</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['university'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Angkatan & Semester</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['cohort'] }} &bull; {{ $profile['semester'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Dosen Pembimbing Akademik</dt>
                                <dd class="mt-1 text-sm font-semibold text-blue-600 dark:text-blue-400">{{ $profile['advisor'] }}</dd>
                            </div>
                            <div>
                                <dt class="font-mono text-xs text-zinc-500">Fokus Riset Tugas 4</dt>
                                <dd class="mt-1 text-sm font-semibold text-zinc-900 dark:text-white">{{ $profile['focus'] }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mt-6 pt-4 border-t border-zinc-100 dark:border-zinc-800 flex items-center justify-between text-xs font-mono text-zinc-500">
                        <span>Departemen Teknik Informatika ITS</span>
                        <a href="{{ route('ide-agent') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Lihat Rancangan Agentic AI &rarr;</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Grid Kartu Komponen Reusable <x-info-card> --}}
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-zinc-900 dark:text-white font-display">
                    Atribut Akademik & Portofolio (Komponen &lt;x-info-card&gt;)
                </h3>
                <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">
                    Komponen kartu reusable yang mengimplementasikan parameter atribut dan slot konten terstruktur.
                </p>
            </div>
            <span class="hidden sm:inline-flex rounded-full bg-blue-500/10 px-3 py-1 font-mono text-xs font-medium text-blue-600 dark:text-blue-400 border border-blue-500/20">
                6 Info Cards Active
            </span>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            
            {{-- Info Card 1: Program Studi --}}
            <x-info-card 
                title="Program Studi" 
                value="{{ $profile['program'] }}" 
                subtitle="Jenjang {{ $profile['degree'] }}" 
                badge="Akreditasi Unggul"
                badgeColor="blue">
                <x-slot:icon>
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </x-slot:icon>
                Kurikulum berbasis Outcome-Based Education (OBE) standar internasional dengan konsentrasi komputasi cerdas dan rekayasa perangkat lunak modern.
            </x-info-card>

            {{-- Info Card 2: Capaian IPK --}}
            <x-info-card 
                title="Capaian Akademik" 
                value="IPK: {{ $profile['gpa'] }}" 
                subtitle="{{ $profile['sks_completed'] }} dari {{ $profile['total_target_sks'] }} SKS Target" 
                badge="Dengan Pujian"
                badgeColor="emerald">
                <x-slot:icon>
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </x-slot:icon>
                Konsistensi capaian indeks prestasi kumulatif cum laude pada semester 5, siap melanjutkan ke fase peminatan proyek tugas akhir.
            </x-info-card>

            {{-- Info Card 3: Dosen Wali --}}
            <x-info-card 
                title="Dosen Pembimbing Akademik" 
                value="{{ $profile['advisor'] }}" 
                subtitle="NIP: {{ $profile['advisor_nip'] }}" 
                badge="Dosen Wali DTIF"
                badgeColor="purple">
                <x-slot:icon>
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </x-slot:icon>
                Pembimbing akademik aktif untuk konsultasi rencana studi (FRS), pengawasan perkembangan SKS, dan bimbingan riset keilmuan.
            </x-info-card>

            {{-- Info Card 4: Laboratorium Riset --}}
            <x-info-card 
                title="Laboratorium Riset" 
                value="Lab RPL & Lab KCV" 
                subtitle="Departemen Teknik Informatika" 
                badge="Riset Berjalan"
                badgeColor="amber">
                <x-slot:icon>
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </x-slot:icon>
                Aktivitas riset terfokus pada Rekayasa Perangkat Lunak (RPL) dan Komputasi Cerdas & Visi (KCV) untuk implementasi model Agentic AI.
            </x-info-card>

            {{-- Info Card 5: Fakultas & Kampus --}}
            <x-info-card 
                title="Fakultas & Lingkungan" 
                value="{{ $profile['faculty_short'] }} ITS" 
                subtitle="{{ $profile['campus'] }}" 
                badge="Kampus Perjuangan"
                badgeColor="blue">
                <x-slot:icon>
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </x-slot:icon>
                Fakultas Teknologi Elektro dan Informatika Cerdas, rumah bagi riset otomasi cerdas, robotika, dan rekayasa piranti lunak berkelas dunia.
            </x-info-card>

            {{-- Info Card 6: Fokus Proyek Agentic AI --}}
            <x-info-card 
                title="Proyek Kelompok PBKK" 
                value="{{ $profile['agent_project']['codename'] }}" 
                subtitle="{{ $profile['agent_project']['role'] }}" 
                badge="PBKK 2026"
                badgeColor="purple">
                <x-slot:icon>
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </x-slot:icon>
                Platform Agentic AI otonom untuk pipeline screening dan rekrutmen kandidat secara otomatis dengan scoring cerdas berbasis LLM.
            </x-info-card>

        </div>
    </section>

    {{-- Tabel Riwayat Mata Kuliah Unggulan --}}
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 sm:p-8 shadow-xs">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
                <div>
                    <h3 class="text-lg font-bold text-zinc-900 dark:text-white font-display">
                        Riwayat Mata Kuliah & Kompetensi Studi
                    </h3>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-0.5">
                        Mata kuliah pokok pendukung komputasi cerdas, basis data, dan rekayasa kerangka kerja.
                    </p>
                </div>
                <span class="font-mono text-xs text-zinc-500 bg-zinc-100 dark:bg-zinc-800/80 px-3 py-1 rounded-lg border border-zinc-200 dark:border-zinc-700">
                    Total: {{ count($profile['courses']) }} Mata Kuliah Ditampilkan
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left font-mono text-xs">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-800 text-zinc-500 uppercase tracking-wider text-[11px]">
                            <th class="py-3 px-3">Kode MK</th>
                            <th class="py-3 px-4 font-sans font-semibold">Nama Mata Kuliah</th>
                            <th class="py-3 px-3 text-center">Beban SKS</th>
                            <th class="py-3 px-3 text-center">Nilai</th>
                            <th class="py-3 px-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800/60">
                        @foreach ($profile['courses'] as $course)
                            <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors">
                                <td class="py-3 px-3 font-semibold text-blue-600 dark:text-blue-400">{{ $course['code'] }}</td>
                                <td class="py-3 px-4 font-sans font-medium text-zinc-900 dark:text-white">{{ $course['name'] }}</td>
                                <td class="py-3 px-3 text-center text-zinc-600 dark:text-zinc-300">{{ $course['sks'] }} SKS</td>
                                <td class="py-3 px-3 text-center">
                                    <span class="rounded bg-emerald-500/10 px-2 py-0.5 font-bold text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                        {{ $course['grade'] }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right">
                                    @if ($course['status'] === 'Sedang Ditempuh')
                                        <span class="inline-flex items-center gap-1 text-blue-600 dark:text-blue-400 font-medium">
                                            <span class="size-1.5 rounded-full bg-blue-500 animate-pulse"></span> Sedang Ditempuh
                                        </span>
                                    @else
                                        <span class="text-zinc-500 dark:text-zinc-400">Lulus</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection
