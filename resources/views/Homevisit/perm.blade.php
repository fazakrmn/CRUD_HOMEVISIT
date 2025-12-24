<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permasalahan Anda - Mutiara Medika</title>
    <link rel="stylesheet" href="css/perm.css">
</head>
<body>

    <main class="container">
        <div class="stepper">
            <div class="step">
                <div class="circle">1</div>
                <span>Input Data</span>
            </div>
            <div class="step">
                <div class="circle">2</div>
                <span>Pilih Jadwal</span>
            </div>
            <div class="step active">
                <div class="circle">3</div>
                <span>Permasalahan</span>
            </div>
            <div class="step">
                <div class="circle">4</div>
                <span>Dokumen</span>
            </div>
        </div>

        <h2 class="title-section">PERMASALAHAN ANDA</h2>

        <div class="options-list">
            <div class="option-item">KB implant</div>
            <div class="option-item">Pemeriksaan kehamilan</div>
            <div class="option-item">Perawatan ibu nifas</div>
            <div class="option-item">Perawatan bayi baru lahir</div>
            <div class="option-item">Masalah reproduksi</div>
        </div>

        <div class="button-group">
            <button class="btn-kembali">
                <a href="{{ route('Homevisit.jadwal') }}">KEMBALI</a>
            </button>   
            <button class="btn-selanjutnya">
                <a href="{{ route('Homevisit.index') }}">SELANJUTNYA</a>
            </button>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-column">
            <strong>MUTIARA MEDIKA</strong><br>
            KLINIK PRATAMA MUTIARA MEDIKA
        </div>
        <div class="footer-column">
            Puskesmas Pabuaran Purwokerto<br>
            Banyumas, Jawa Tengah 53124
        </div>
        <div class="footer-column">
            Telepon: (0281) 641972<br>
            WhatsApp: 081122334455
        </div>
    </footer>

</body>
</html>