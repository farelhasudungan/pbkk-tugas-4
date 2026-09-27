@extends('layouts.app')

@section('title', 'Ide Platform Agentic AI: ' . $theme)

@section('content')
<div class="relative">

    <!-- Header & Theme Information -->
    <section class="mx-auto max-w-5xl px-6 pt-12 pb-8 sm:pt-16">
        <div class="mb-4 flex flex-wrap items-center gap-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-purple-500/30 bg-purple-500/10 px-3 py-1 font-mono text-xs font-medium text-purple-600 dark:text-purple-400">
                <span class="size-2 rounded-full bg-purple-500"></span>
                <span>GET /agent/{tema?}</span>
            </div>
            <span class="font-mono text-xs text-zinc-500 dark:text-zinc-400 bg-zinc-200/60 dark:bg-zinc-800/60 px-2.5 py-0.5 rounded-full border border-zinc-300 dark:border-zinc-700">
                Laravel 12 + Livewire + Queue Mailer + LLM Engine
            </span>
        </div>

        <h1 class="max-w-4xl text-3xl font-semibold leading-[1.08] tracking-tight text-zinc-900 dark:text-white sm:text-4xl lg:text-5xl font-display">
            Ide Platform Agentic AI: <br class="hidden sm:inline">
            <span class="gradient-text font-bold">
                @if ($theme === 'General Assistant Agent' || str_contains($theme, 'Recruiting'))
                    {{ 'Recruiting & Hiring Agents' }}
                @else
                    {{ $theme }}
                @endif
            </span>
        </h1>

        <p class="mt-5 max-w-3xl text-base sm:text-lg leading-relaxed text-zinc-600 dark:text-zinc-400">
            Platform Agentic AI otonom untuk merevolusi proses rekrutmen talenta. Menggantikan proses screening manual HR dengan pipeline cerdas: 
            <span class="text-zinc-900 dark:text-white font-medium">menangkap data email & form &rarr; analisis CV & jawaban kuesioner &rarr; kalkulasi ranking kandidat &rarr; otomatisasi pengiriman email keputusan (diterima / ditolak)</span>.
            @if ($theme === 'General Assistant Agent')
                <br><span class="text-xs font-mono text-purple-600 dark:text-purple-400 mt-2 block">&bull; Parameter rute opsional kosong &mdash; Fallback default aktif: <strong>{{ $theme }}</strong>.</span>
            @else
                <br><span class="text-xs font-mono text-purple-600 dark:text-purple-400 mt-2 block">&bull; Parameter tema kustom aktif: <strong>{{ $theme }}</strong>.</span>
            @endif
        </p>

        <!-- Interactive Theme Presets Bar -->
        <div class="mt-6 flex flex-col gap-2">
            <span class="font-mono text-xs text-zinc-500 dark:text-zinc-400">Uji Coba Parameter Tema Rute (/agent/{tema?}):</span>
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('agent.show') }}" 
                   class="rounded-lg px-3 py-1.5 font-mono text-xs transition-colors {{ $theme === 'General Assistant Agent' ? 'bg-purple-600 text-white font-semibold' : 'bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-purple-500' }}">
                    &bull; Default (General Assistant Agent)
                </a>
                <a href="{{ route('agent.show', ['tema' => 'Recruiting-and-Hiring-Agent']) }}" 
                   class="rounded-lg px-3 py-1.5 font-mono text-xs transition-colors {{ str_contains($theme, 'Recruiting') ? 'bg-purple-600 text-white font-semibold' : 'bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-purple-500' }}">
                    &bull; Recruiting & Hiring Agent (Proyek Utama)
                </a>
                <a href="{{ route('agent.show', ['tema' => 'Academic-Research-Agent']) }}" 
                   class="rounded-lg px-3 py-1.5 font-mono text-xs transition-colors {{ str_contains($theme, 'Academic-Research') ? 'bg-purple-600 text-white font-semibold' : 'bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-purple-500' }}">
                    &bull; Academic-Research-Agent
                </a>
                <a href="{{ route('agent.show', ['tema' => 'Database-Health-Checker-Agent']) }}" 
                   class="rounded-lg px-3 py-1.5 font-mono text-xs transition-colors {{ str_contains($theme, 'Database') ? 'bg-purple-600 text-white font-semibold' : 'bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 hover:border-purple-500' }}">
                    &bull; Database Health Checker Agent
                </a>
            </div>
        </div>

        <!-- 3 Quick Meta Pills -->
        <div class="mt-7 grid gap-3 text-xs font-mono sm:grid-cols-3">
            <div class="rounded-lg border border-zinc-200 bg-white p-3 dark:border-zinc-800 dark:bg-zinc-900/60">
                <span class="block text-zinc-500">Target Pengguna</span>
                <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">HR & Talent Acquisition Team</span>
            </div>
            <div class="rounded-lg border border-zinc-200 bg-white p-3 dark:border-zinc-800 dark:bg-zinc-900/60">
                <span class="block text-zinc-500">Interaction Model</span>
                <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Automated Pipeline & Livewire Board</span>
            </div>
            <div class="rounded-lg border border-zinc-200 bg-white p-3 dark:border-zinc-800 dark:bg-zinc-900/60">
                <span class="block text-zinc-500">AI Engine & Mailer</span>
                <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Ollama / Senopati ITS + Queue Mail</span>
            </div>
        </div>
    </section>

    <!-- Problem & Solution Section -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="grid gap-5 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="rounded-xl border border-rose-500/25 bg-rose-50/50 p-6 dark:bg-rose-950/10">
                <span class="font-mono text-xs font-semibold uppercase tracking-wider text-rose-600 dark:text-rose-400">Masalah yang Diangkat</span>
                <h2 class="mt-3 text-xl font-semibold tracking-tight text-zinc-900 dark:text-white font-display">
                    Screening manual memakan ratusan jam, rawan bias, & lambat merespons pelamar.
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-zinc-600 dark:text-zinc-400">
                    Tim HR harus membuka ratusan CV, resume, dan jawaban kuesioner satu per satu. Proses manual ini sangat lambat, rentan bias subjektif, membebani operasional, dan membuat mayoritas pelamar tidak mendapat kejelasan status (*ghosting*) karena HR tak sempat membalas satu demi satu.
                </p>
            </div>

            <div class="rounded-xl border border-blue-500/25 bg-blue-50/60 p-6 dark:bg-blue-950/20">
                <span class="font-mono text-xs font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">Solusi Agentic AI</span>
                <h2 class="mt-3 text-xl font-semibold tracking-tight text-zinc-900 dark:text-white font-display">
                    Agent mengurai data, menilai kecocokan, menyusun ranking, & kirim email otomatis.
                </h2>
                <p class="mt-3 text-sm leading-relaxed text-zinc-600 dark:text-zinc-400">
                    Agent secara otonom memproses data dari formulir atau email masuk. Berkas CV dan jawaban screening diparsing oleh LLM untuk mengukur kecocokan dengan kriteria pekerjaan. Sistem menyusun perankingan objektif, kemudian <code class="rounded bg-blue-100 dark:bg-blue-900/50 px-1.5 py-0.5 font-mono text-xs text-blue-800 dark:text-blue-200">Queue Mailer</code> mengeksekusi pengiriman email penolakan yang santun atau email penerimaan & undangan wawancara secara otomatis.
                </p>
            </div>
        </div>
    </section>

    <!-- 6 Feature Cards -->
    <section class="mx-auto max-w-5xl px-6 py-8">
        <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold tracking-tight text-zinc-900 dark:text-white font-display">Fitur Utama Platform Recruiting Agent</h2>
                <p class="mt-1 font-mono text-xs text-zinc-500 dark:text-zinc-400">ingestion, parsing, AI scoring, auto-reject, auto-accept, livewire board</p>
            </div>
            <span class="tag-pill w-fit">Agent Capabilities</span>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <div class="mb-3 flex size-9 items-center justify-center rounded-lg border border-blue-500/20 bg-blue-500/10 font-mono text-xs font-bold text-blue-600 dark:text-blue-400">01</div>
                <h3 class="text-sm font-bold text-zinc-900 dark:text-white">Multi-Source Ingestion</h3>
                <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Menyerap data lamaran secara instan dari lampiran email masuk, Google Forms, form web rekrutmen, maupun portal karir perusahaan.</p>
            </div>

            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <div class="mb-3 flex size-9 items-center justify-center rounded-lg border border-purple-500/20 bg-purple-500/10 font-mono text-xs font-bold text-purple-600 dark:text-purple-400">02</div>
                <h3 class="text-sm font-bold text-zinc-900 dark:text-white">CV & Questionnaire Parsing</h3>
                <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">AI mengekstraksi riwayat pengalaman, keahlian teknis, portofolio, dan analisis sentimen esai screening dari dokumen pelamar.</p>
            </div>

            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <div class="mb-3 flex size-9 items-center justify-center rounded-lg border border-emerald-500/20 bg-emerald-500/10 font-mono text-xs font-bold text-emerald-600 dark:text-emerald-400">03</div>
                <h3 class="text-sm font-bold text-zinc-900 dark:text-white">Objective AI Ranking & Scoring</h3>
                <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Mengalkulasi skor kecocokan kandidat (0–100%) terhadap kriteria posisi dan menyusun papan peringkat talenta secara transparan.</p>
            </div>

            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <div class="mb-3 flex size-9 items-center justify-center rounded-lg border border-amber-500/20 bg-amber-500/10 font-mono text-xs font-bold text-amber-600 dark:text-amber-400">04</div>
                <h3 class="text-sm font-bold text-zinc-900 dark:text-white">Auto-Dispatch Email Ditolak</h3>
                <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Bila kandidat tidak memenuhi batas skor kualifikasi, sistem otomatis menembakkan email penolakan yang santun dan konstruktif.</p>
            </div>

            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <div class="mb-3 flex size-9 items-center justify-center rounded-lg border border-cyan-500/20 bg-cyan-500/10 font-mono text-xs font-bold text-cyan-600 dark:text-cyan-400">05</div>
                <h3 class="text-sm font-bold text-zinc-900 dark:text-white">Auto-Dispatch Email Diterima</h3>
                <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Kandidat yang lolos otomatis menerima email ucapan selamat beserta tautan kalender untuk memilih jadwal wawancara langsung.</p>
            </div>

            <div class="rounded-xl border border-zinc-200 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <div class="mb-3 flex size-9 items-center justify-center rounded-lg border border-rose-500/20 bg-rose-500/10 font-mono text-xs font-bold text-rose-600 dark:text-rose-400">06</div>
                <h3 class="text-sm font-bold text-zinc-900 dark:text-white">Livewire HR Control Board</h3>
                <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Antarmuka interaktif bagi HR untuk memantau status kandidat, melihat argumen analisis AI, dan melakukan override keputusan.</p>
            </div>
        </div>
    </section>

    <!-- 4 Step Agent Workflow: The Cognitive Hiring Loop -->
    <section class="mx-auto max-w-5xl px-6 py-8">
        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
            <div class="mb-6 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-xl font-semibold tracking-tight text-zinc-900 dark:text-white font-display">Alur Kerja Otonom Agent (Cognitive Hiring Pipeline)</h2>
                    <p class="mt-1 font-mono text-xs text-zinc-500 dark:text-zinc-400">from raw application submission to automated email dispatch</p>
                </div>
                <span class="font-mono text-xs text-zinc-500 dark:text-zinc-400">Ingest &rarr; Parse &rarr; Rank &rarr; Dispatch</span>
            </div>

            <div class="grid gap-4 md:grid-cols-4">
                <div class="rounded-lg bg-zinc-50 p-4 dark:bg-zinc-950/60 border border-zinc-200/60 dark:border-zinc-800/60">
                    <span class="font-mono text-[11px] font-semibold text-blue-600 dark:text-blue-400">STEP 1 &bull; INGEST</span>
                    <h3 class="mt-2 text-sm font-bold text-zinc-900 dark:text-white">Pelamar Mengirim Data</h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Berkas CV dan isian form screening masuk otomatis dari email atau portal rekrutmen.</p>
                </div>
                <div class="rounded-lg bg-zinc-50 p-4 dark:bg-zinc-950/60 border border-zinc-200/60 dark:border-zinc-800/60">
                    <span class="font-mono text-[11px] font-semibold text-purple-600 dark:text-purple-400">STEP 2 &bull; PARSE</span>
                    <h3 class="mt-2 text-sm font-bold text-zinc-900 dark:text-white">AI Ekstraksi & Analisis</h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">LLM menganalisis keahlian, relevansi proyek, dan kualitas jawaban esai screening secara mendalam.</p>
                </div>
                <div class="rounded-lg bg-zinc-50 p-4 dark:bg-zinc-950/60 border border-zinc-200/60 dark:border-zinc-800/60">
                    <span class="font-mono text-[11px] font-semibold text-emerald-600 dark:text-emerald-400">STEP 3 &bull; RANK</span>
                    <h3 class="mt-2 text-sm font-bold text-zinc-900 dark:text-white">AI Scoring & Ranking</h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Sistem mengalkulasi skor kesesuaian dan menyusun urutan pemeringkatan kandidat secara objektif.</p>
                </div>
                <div class="rounded-lg bg-zinc-50 p-4 dark:bg-zinc-950/60 border border-zinc-200/60 dark:border-zinc-800/60">
                    <span class="font-mono text-[11px] font-semibold text-amber-600 dark:text-amber-400">STEP 4 &bull; DISPATCH</span>
                    <h3 class="mt-2 text-sm font-bold text-zinc-900 dark:text-white">Email Keputusan Otomatis</h3>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">Kirim email penolakan santun jika tidak lolos, atau kirim undangan wawancara jika lolos.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Architecture & Value Added -->
    <section class="mx-auto max-w-5xl px-6 py-8 pb-24">
        <div class="grid gap-5 lg:grid-cols-[1.1fr_0.9fr]">
            <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/60 dark:shadow-none">
                <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Rancangan Arsitektur Platform</h2>
                <div class="mt-5 grid gap-3 text-xs font-mono sm:grid-cols-2">
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800/80 dark:bg-zinc-950/60">
                        <span class="block text-zinc-500">Ingestion Channel</span>
                        <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Email IMAP & Webhook</span>
                    </div>
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800/80 dark:bg-zinc-950/60">
                        <span class="block text-zinc-500">Application Layer</span>
                        <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Laravel 12 Framework</span>
                    </div>
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800/80 dark:bg-zinc-950/60">
                        <span class="block text-zinc-500">Reactive Dashboard</span>
                        <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Laravel Livewire</span>
                    </div>
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800/80 dark:bg-zinc-950/60">
                        <span class="block text-zinc-500">LLM Engine</span>
                        <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Ollama / Senopati AI ITS</span>
                    </div>
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800/80 dark:bg-zinc-950/60">
                        <span class="block text-zinc-500">Decision Dispatcher</span>
                        <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">Laravel Queue & Mailer</span>
                    </div>
                    <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-3 dark:border-zinc-800/80 dark:bg-zinc-950/60">
                        <span class="block text-zinc-500">Document Parser</span>
                        <span class="mt-1 block font-semibold text-zinc-900 dark:text-white">PDF / DOCX Extractor</span>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-purple-500/30 bg-purple-50/50 p-6 dark:bg-purple-950/20 flex flex-col justify-between">
                <div>
                    <span class="tag-pill !text-purple-600 dark:!text-purple-400">Nilai Tambah Platform</span>
                    <h2 class="mt-4 text-lg font-bold text-zinc-900 dark:text-white">Zero-Ghosting & Bias-Free Hiring</h2>
                    <p class="mt-3 text-sm leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Platform mengeliminasi kebiasaan buruk pelamar digantung (*ghosting*) dengan memastikan 100% pelamar menerima respon tepat waktu. Pelamar yang ditolak mendapatkan feedback yang konstruktif, sementara kandidat yang lolos langsung terjadwal ke sesi wawancara secara mulus dan transparan.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-purple-500/20">
                    <a href="{{ route('home') }}" class="font-mono text-xs text-purple-700 dark:text-purple-400 hover:underline">
                        &larr; Kembali ke Beranda Utama
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
