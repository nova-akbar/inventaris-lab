@extends('layout')

@section('content')

<style>
    /* FULL HERO SECTION STYLE */
    .hero {
        position: relative;
        width: 100%;
        height: 600px;
        background: url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=80')
        center/cover no-repeat;
        display: flex;
        align-items: center;
        color: white;
    }

    .hero-overlay {
        position: absolute;
        background: rgba(0,0,0,0.45);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .hero-content {
        position: relative;
        margin-left: 90px;
        margin-top: 80px;
        max-width: 580px;
    }

    .hero-title {
        font-size: 45px;
        font-weight: 700;
        line-height: 1.2;
    }

    .hero-text {
        margin-top: 18px;
        font-size: 17px;
        max-width: 520px;
    }

    .hero-btn {
        margin-top: 28px;
        display: inline-block;
        padding: 12px 26px;
        border: 2px solid #f38b45;
        background: transparent;
        color: #f38b45;
        border-radius: 3px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }

    .hero-btn:hover {
        background: #f38b45;
        color: white;
    }

    /* ===== LAB SECTION ===== */
    .section-title {
        font-size: 32px;
        font-weight: 700;
        color: #1e1e1e;
        text-align: center;
        margin-top: 60px;
        margin-bottom: 40px;
    }

    .lab-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        padding-bottom: 60px;
    }

    .lab-card {
        background: rgba(255,255,255,0.7);
        backdrop-filter: blur(12px);
        border-radius: 16px;
        overflow: hidden;
        padding-bottom: 10px;
        border: 1px solid rgba(255,255,255,0.4);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12), inset 0 0 0 1px rgba(255,255,255,0.4);
        transition: 0.35s ease;
    }

    .lab-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.18), inset 0 0 0 1px rgba(255,255,255,0.6);
    }

    .lab-card-header {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        padding: 26px;
        color: white;
        font-size: 22px;
        font-weight: 700;
        text-align: center;
    }

    .lab-card-body {
        padding: 22px;
        font-size: 16px;
        color: #333;
    }

    .lab-info {
        margin-bottom: 15px;
        font-size: 15px;
        line-height: 1.5;
    }

    .lab-info strong {
        color: #1e1e1e;
    }

    .view-btn {
        display: inline-block;
        padding: 10px 18px;
        background: #ff7b00;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.25s ease;
    }

    .view-btn:hover {
        background: #e56d00;
        transform: translateX(5px);
    }


    /* ===== PREMIUM FEATURE SECTION ===== */
    .extra-section {
        margin-top: 50px;
        padding: 70px 0;
        background: linear-gradient(180deg, #efba3fff, #ffffffff);
        border-radius: 20px;
    }

    .extra-title {
        text-align: center;
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 45px;
        color: #1c1c1c;
        letter-spacing: 0.5px;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 30px;
        padding: 0 25px;
    }

    .feature-card {
        position: relative;
        padding: 32px 26px;
        background: rgba(255,255,255,0.65);
        backdrop-filter: blur(18px);
        border-radius: 18px;
        border: 1px solid rgba(255,162,80,0.45);
        text-align: center;

        box-shadow:
            0 10px 25px rgba(0,0,0,0.12),
            inset 0 0 0 1px rgba(255,255,255,0.6);

        transition: .35s ease;
        overflow: hidden;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow:
            0 20px 40px rgba(0,0,0,0.18),
            inset 0 0 0 1px rgba(255,255,255,0.75);
    }

    .feature-icon {
        font-size: 45px;
        color: #ff7b00;
        margin-bottom: 18px;
        filter: drop-shadow(0 3px 6px rgba(255,140,0,0.5));
        transition: .3s;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.18);
    }

    .feature-card h4 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #1f1f1f;
    }

    .feature-card p {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
    }


    /* ========= MONITORING STATISTIK ========= */
    .stat-section {
        margin-top: 60px;
        padding: 60px 25px;
    }

    .stat-title {
        text-align: center;
        font-size: 32px;
        font-weight: 800;
        margin-bottom: 45px;
    }

    .stat-grid {
        display: flex;
        justify-content: center;
        gap: 25px;
        flex-wrap: wrap;
    }

    .stat-card {
        width: 260px;
        padding: 22px;
        background: linear-gradient(135deg, #ff9e3d, #ff7a00);
        color: white;
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(255,125,0,0.4);
        text-align: center;
        transition: .3s ease;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(255,125,0,0.5);
    }

    .stat-number {
        font-size: 42px;
        font-weight: 800;
    }

    .stat-label {
        font-size: 16px;
        opacity: 0.9;
    }

    /* ===== CHART SECTION ===== */
    .chart-container {
        width: 90%;
        max-width: 900px;
        margin: 70px auto;
        background: white;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

</style>


{{-- HERO SECTION --}}
<div class="hero">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="hero-title">
            MARI MENGEXPLORE FITUR FITUR<br>
            MANAJEMEN LAB
        </h1>

        <p class="hero-text">
            Sistem inventaris laboratorium untuk memantau barang, penanggung jawab,
            dan mutasi barang antar laboratorium.
        </p>

        <a href="{{ route('barang.create') }}" class="hero-btn">
            TAMBAH BARANG
        </a>
    </div>
</div>



{{-- LAB SECTION --}}
<div class="container mt-5">

    <h2 class="section-title">Daftar Laboratorium</h2>

    <div class="lab-grid">

        @foreach($lab as $item)
            <div class="lab-card">

                <div class="lab-card-header">{{ $item->nama_lab }}</div>

                <div class="lab-card-body">
                    <p class="lab-info">
                        <strong>Penanggung Jawab:</strong><br>
                        {{ $item->penanggung_jawab ?? 'Belum diisi' }}
                    </p>

                    <a href="{{ route('lab.show', $item->id) }}" class="view-btn">Lihat Detail →</a>
                </div>

            </div>
        @endforeach

    </div>
</div>



{{-- PREMIUM FEATURE SECTION --}}
<div class="extra-section">

    <h2 class="extra-title">Fitur Unggulan Sistem Inventaris</h2>

    <div class="feature-grid">

        <div class="feature-card">
            <i class="fas fa-box feature-icon"></i>
            <h4>Manajemen Barang</h4>
            <p>Mengelola data aset laboratorium secara detail dan efisien.</p>
        </div>

        <div class="feature-card">
            <i class="fas fa-vials feature-icon"></i>
            <h4>Pengelolaan Laboratorium</h4>
            <p>Pantau daftar laboratorium, penanggung jawab, dan fasilitasnya.</p>
        </div>

        <div class="feature-card">
            <i class="fas fa-random feature-icon"></i>
            <h4>Mutasi Barang</h4>
            <p>Lacak perpindahan barang antar lab dengan pencatatan otomatis.</p>
        </div>

        <div class="feature-card">
            <i class="fas fa-chart-line feature-icon"></i>
            <h4>Monitoring Statistik</h4>
            <p>Statistik barang, mutasi, dan aktivitas sistem secara realtime.</p>
        </div>

    </div>
</div>



{{-- STATISTIK --}}
<div class="stat-section">

    <h2 class="stat-title">Monitoring Statistik Sistem</h2>

    <div class="stat-grid">

        <div class="stat-card">
            <div class="stat-number">{{ $totalLab }}</div>
            <div class="stat-label">Total Laboratorium</div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $totalBarang }}</div>
            <div class="stat-label">Total Barang</div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $totalMutasi }}</div>
            <div class="stat-label">Total Mutasi Barang</div>
        </div>

    </div>

</div>



{{-- ====== CHART SECTION ====== --}}
<div class="chart-container">
    <canvas id="chartBarang"></canvas>
</div>

<div class="chart-container">
    <canvas id="chartMutasi"></canvas>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labs = @json($lab->pluck('nama_lab'));

    const barangCount = @json(
        $lab->map(fn($l) => $l->barang?->count() ?? 0)
    );

    const mutasiCount = @json(
        $lab->map(fn($l) => $l->mutasiAsal?->count() ?? 0)
    );

    /* CHART BARANG */
    new Chart(document.getElementById('chartBarang'), {
        type: 'bar',
        data: {
            labels: labs,
            datasets: [{
                label: 'Total Barang per Lab',
                data: barangCount,
                backgroundColor: '#ff7b00'
            }]
        },
        options: {
            responsive: true
        }
    });

    /* CHART MUTASI */
    new Chart(document.getElementById('chartMutasi'), {
        type: 'line',
        data: {
            labels: labs,
            datasets: [{
                label: 'Mutasi Barang per Lab',
                data: mutasiCount,
                borderColor: '#ff7b00',
                backgroundColor: 'rgba(255,123,0,0.4)'
            }]
        },
        options: {
            responsive: true
        }
    });

</script>

@endsection
