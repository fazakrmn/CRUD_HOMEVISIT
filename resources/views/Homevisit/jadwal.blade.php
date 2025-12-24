<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Klinik Mutiara Medika</title>
    <link rel="stylesheet" href="css/jadwal.css">
</head>
<body>

    <main class="container">
        <h2 class="title">PILIH JADWAL</h2>
        
        <div class="grid-selection">
            <div class="card">
                <label><span class="square-icon"></span> Pilih Tanggal</label>
                <div class="input-field"></div>
            </div>
            
            <div class="card">
                <label><span class="square-icon"></span> Pilih Waktu</label>
                <div class="input-field"></div>
            </div>
        </div>

        <div class="button-group">
            <button class="btn-kembali">
              <a href="{{ route('Homevisit.pendaftaran') }}">KEMBALI</a>
            </button>
            <button class="btn-daftar">
              <a href="{{ route('Homevisit.perm') }}">DAFTAR</a>
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