<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12">
        <form action="#" onsubmit="kirimPesan()">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input class="form-control"type="text" name="nik" id="nik" value="{{ $datawarga->nik }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control"type="text" name="nama" id="nama" value="{{ $datawarga->nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="kontak">kontak</label>
                <input class="form-control"type="number" name="kontak" id="kontak" value="{{ $datawarga->kontak }}" readonly>
            </div>
            <br>
            <div class="text mx-auto d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
            </div>
            
        </form>
    </div>
</div>
<script>
    function kirimPesan() {
        var nomor = `62${kontak.value}`;
        const pesan =
            `Silahkan Aktivasi akun anda di Aplikasi Rukun Warga dengan salin username lalu tekan link AplikasiRW.com \nMasukkan username anda \nUsername = ${nik.value} \n`
        const urlWhatsapp =
            `http://wa.me/${nomor}?text=${encodeURIComponent(pesan)}`;

        window.open(urlWhatsapp, "_blank");

    }
</script>
