<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="css/pendaftaran.css">
</head>
<body>

<div class="container">
    <!-- STEPPER -->
    <div class="stepper">
        <div class="step active">
            <span>1</span>
            <p>Input Data</p>
        </div>
        <div class="step">
            <span>2</span>
            <p>Pilih Jadwal</p>
        </div>
        <div class="step">
            <span>3</span>
            <p>Permasalahan</p>
        </div>
        <div class="step">
            <span>4</span>
            <p>Dokumen</p>
        </div>
    </div>

    <h2>PENDAFTARAN</h2>

    <!-- FORM -->
    <form class="form" action="{{ route('pendaftaran.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input  class="placeholder" type="text" placeholder="nama wajib diisi">
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input class="placeholder"type="text" placeholder="maksimal 12 karakter">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input class="placeholder" type="text" placeholder="masukan alamat lengkap sesuai KTP">
        </div>

        <div class="form-group">
            <label>NIK</label>
            <input class="placeholder" type="text" placeholder="masukan NIK sesuai KTP">
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select>
                <option value="">-- Pilih --</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date">
        </div>

        <!-- BUTTON -->
        <div class="button-group">
            <button type="button" class="btn-back">
              <a href="{{route('Homevisit.index')}}">KEMBALI</a></button>
            <button type="submit" class="btn-next">
              <a href="{{ route('Homevisit.jadwal') }}">SELANJUTNYA</a></button>
        </div>
    </form>
</div>

</body>
</html>
