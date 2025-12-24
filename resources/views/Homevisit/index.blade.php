<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutiara Medika - Layanan Kesehatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <nav>
        <div class="logo">MUTIARA MEDIKA</div>
        <div class="nav-links">
            <a href="#">Tentang</a>
            <a href="#">Layanan</a>
            <a href="#">Jadwal Dokter</a>
            <a href="{{route('sign.login')}}">Log In</a>
            <a href="{{route('sign.signup')}}">Sign In</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <h2>MENYEDIAKAN LAYANAN KESEHATAN BERKUALITAS.</h2>
            <p>Klinik Mutiara Medika merupakan layanan kesehatan<BR>
             untuk masyarakat yang menyediakan berbagai jenis pelayanan medis. <BR>
             Klinik Mutiara Medika memiliki beberapa layanan kesehatan, dan ke depannya<BR>
              akan mengembangkan layanan berbasis teknologi <BR>
              untuk memudahkan pasien dalam mendapatkan pelayanan.</p>
            <button class="btn-lainnya">TENTANG KAMI</button>
        </div>
        <!-- <div class="hero-image">
            <img src="images/meedika.png">
        </div> -->
    </section>

    <div class="emergency-container">
        <div class="e-card">
            <i class="fa-regular fa-hospital" style="font-size: 3rem;"></i>
            <h3>EMERGENCY</h3>
            <p>Layanan panggilan darurat yang dapat dihubungi saat membutuhkan bantuan medis cepat. (0281) 641972</p>
        </div>
        <div class="e-card">
            <i class="fa-regular fa-clock" style="font-size: 3rem;"></i>
            <h3>JAM OPERASIONAL</h3>
            <p>
                Senin     07.00–12.00, 16.00–20.00<BR>
                Selasa    07.00–12.00, 16.00–20.00<BR>
                Rabu      07.00–12.00, 16.00–20.00<BR>
                Kamis     07.00–12.00, 16.00–20.00<BR>
                Jumat     07.00–12.00, 16.00–21.00<BR>
                Sabtu     07.00–12.00, 16.00–21.35<BR>
                Minggu    14.35–21.35
            </p>
        </div>
        <div class="e-card">
            <i class="fa-regular fa-message" style="font-size: 3rem;"></i>
            <h3>CONSULTASI</h3>
            <p>Layanan konsultasi dengan dokter melalui chat sehingga pasien dapat memperoleh saran medis tanpa perlu datang ke klinik. Pasien cukup mengirimkan keluhan atau pertanyaan, dan dokter akan memberikan respons serta panduan yang dibutuhkan dengan cepat dan mudah.</p>
        </div>
    </div>
    <h2 class="section-title">LAYANAN KAMI</h2>
    <div class="services-grid">
        <div class="s-box">
            <i class="fas fa-house-medical"></i>
            <div class="s-label">
                <a href="{{ route('Homevisit.pendaftaran') }}">Daftar Home Visit</a>
            </div>
        </div>
        <div class="s-box">
            <i class="fas fa-user-doctor"></i>
            <div class="s-label">
                <a href="{{ route('Homevisit.pendaftaran') }}">KIA / KB</a>
            </div>
        </div>
        <div class="s-box">
            <i class="fas fa-stethoscope"></i>
            <div class="s-label">
                <a href="{{ route('Homevisit.pendaftaran') }}">Pemeriksaan Umum</a>
        </div>
        </div>
        <div class="s-box">
            <i class="fas fa-laptop-medical"></i>
            <div class="s-label">
                <a href="{{ route('Homevisit.pendaftaran') }}">Konsultasi Online</a>
            </div>
        </div>
    </div>

    <footer class="main-footer">
    <div class="footer-item">
        <strong>MUTIARA MEDIKA</strong><br>
        KLINIK PRATAMA MUTIARA MEDIKA
    </div>
    <div class="footer-item">
        Puskesmas Pabuaran Purwokerto<br>
        Banyumas, Jawa Tengah 53124
    </div>
    <div class="footer-item">
        Telepon: (0281) 641972<br>
        WhatsApp: 081122334455
    </div>
    </footer>

</body>
</html>