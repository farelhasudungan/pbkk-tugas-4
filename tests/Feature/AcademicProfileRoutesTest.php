<?php

namespace Tests\Feature;

use Tests\TestCase;

class AcademicProfileRoutesTest extends TestCase
{
    /**
     * Uji Rute 1: Beranda (/ dan /beranda) serta pewarisan Master Layout
     */
    public function test_home_and_beranda_routes_render_master_layout(): void
    {
        $responseHome = $this->get('/');
        $responseHome->assertOk()
            ->assertSee('Aplikasi Multi-View')
            ->assertSee('5025241016')
            ->assertSee('Farrel Hasudungan Immanuel Limbong')
            ->assertSee('Departemen Teknik Informatika')
            ->assertSee('FTEIC ITS');

        $responseBeranda = $this->get('/beranda');
        $responseBeranda->assertOk()
            ->assertSee('Aplikasi Multi-View')
            ->assertSee('5025241016');
    }

    /**
     * Uji Tantangan 2: Alert Status Interaktif via parameter URL ?user=Andi
     */
    public function test_challenge_2_interactive_welcome_status_banner(): void
    {
        // Tes dengan parameter user=Andi
        $responseAndi = $this->get('/beranda?user=Andi');
        $responseAndi->assertOk()
            ->assertSee('Andi')
            ->assertSee('Pesan Selamat Datang Interaktif (CPMK-1 Challenge)')
            ->assertSee('role="alert"', false);

        // Tes dengan parameter user=Budi pada root /
        $responseBudi = $this->get('/?user=Budi');
        $responseBudi->assertOk()
            ->assertSee('Budi')
            ->assertSee('Pesan Selamat Datang Interaktif (CPMK-1 Challenge)');
    }

    /**
     * Uji Rute 2: Profil Mahasiswa (/profil-mahasiswa) & Komponen Reusable <x-info-card>
     */
    public function test_profile_route_renders_with_info_cards(): void
    {
        $response = $this->get('/profil-mahasiswa');
        $response->assertOk()
            ->assertSee('Profil Akademik')
            ->assertSee('Farrel Hasudungan Immanuel Limbong')
            ->assertSee('5025241016')
            ->assertSee('Teknik Informatika')
            ->assertSee('FTEIC ITS')
            ->assertSee('IPK: 3.88')
            ->assertSee('Agus Budi Raharjo')
            ->assertSee('Lab RPL & Lab KCV')
            ->assertSee('IF234401')
            ->assertSee('Pemrograman Berbasis Kerangka Kerja');
    }

    /**
     * Uji Rute 3: Ide-Riset Agentic AI (/ide-agent)
     */
    public function test_ide_agent_route_renders(): void
    {
        $response = $this->get('/ide-agent');
        $response->assertOk()
            ->assertSee('Ide Platform Agentic AI')
            ->assertSee('TalentMatch')
            ->assertSee('Formulir Pengumpulan Ide Platform Agentic AI')
            ->assertSee('Kirim Usulan Ide Agentic AI');
    }

    /**
     * Uji Tantangan 1: Toggle Tema Dinamis via Blade PHP untuk mode gelap (?mode=dark)
     */
    public function test_challenge_1_dynamic_theme_mode(): void
    {
        // Akses mode gelap dinamis
        $responseDark = $this->get('/ide-agent?mode=dark');
        $responseDark->assertOk()
            ->assertSee('data-route-mode="dark"', false)
            ->assertSee('Dark Mode Aktif via ?mode=dark')
            ->assertSee('$mode = "dark"', false);

        // Akses mode terang dinamis
        $responseLight = $this->get('/ide-agent?mode=light');
        $responseLight->assertOk()
            ->assertSee('data-route-mode="light"', false)
            ->assertSee('Light Mode Aktif via ?mode=light');
    }

    /**
     * Uji Formulir Pengumpulan Ide & Notifikasi Sukses <x-status-banner>
     */
    public function test_idea_submission_form_flow(): void
    {
        $ideaData = [
            'author_name' => 'Farrel Limbong',
            'author_email' => '5025241016@student.its.ac.id',
            'agent_category' => 'Autonomous Recruiting & Talent Screener',
            'idea_title' => 'Integrasi Semantic Parser CV dengan LLM Lokal ITS',
            'idea_description' => 'Membangun pipeline ekstraksi skill kandidat berbasis vector embedding dan evaluasi otomatis kriteria lowongan.',
        ];

        // Kirim POST form
        $response = $this->post('/ide-agent?mode=dark', $ideaData);
        $response->assertRedirect('/ide-agent?mode=dark');
        $response->assertSessionHas('success');
        $response->assertSessionHas('submitted_idea');

        // Ikuti redirect dan pastikan <x-status-banner> muncul dengan rincian
        $followRedirect = $this->get('/ide-agent?mode=dark');
        $followRedirect->assertOk()
            ->assertSee('Notifikasi Form: Usulan Ide Berhasil Terkirim!')
            ->assertSee('Farrel Limbong')
            ->assertSee('Integrasi Semantic Parser CV dengan LLM Lokal ITS');
    }

    /**
     * Uji Validasi Formulir jika input kosong/tidak valid
     */
    public function test_idea_submission_validation(): void
    {
        $response = $this->post('/ide-agent', [
            'author_name' => '',
            'author_email' => 'bukan-email',
            'agent_category' => '',
            'idea_title' => '',
            'idea_description' => 'pendek',
        ]);

        $response->assertSessionHasErrors([
            'author_name',
            'author_email',
            'agent_category',
            'idea_title',
            'idea_description',
        ]);
    }
}
