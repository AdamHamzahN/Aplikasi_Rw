<div class="row">
    <div class="col-lg-12">
        <form action="#" onsubmit="kirimPesan()">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input class="form-control"type="text" name="nik" id="nik" value="{{ $datawarga->nik }}">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input class="form-control"type="text" name="password" id="password" value="{{ $akun->password }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control"type="text" name="nama" id="nama" value="{{ $datawarga->nama }}">
            </div>
            <div class="form-group">
                <label for="kontak">kontak</label>
                <input class="form-control"type="number" name="kontak" id="kontak" value="{{ $datawarga->kontak }}">
            </div>
            <button type="submit" class="btn btn-submit">Kirim</button>
        </form>
    </div>
</div>
<script>
    function kirimPesan() {
        var nomor = `62${kontak.value}`;
        const pesan =
            `Silahkan Aktivasi akun anda di Aplikasi Rukun Warga dengan menekan link AplikasiRW.com \nMasukkan username dan password anda \nUsername = ${nik.value} \nPassword = ${password.value}`
        const urlWhatsapp =
            `http://wa.me/${nomor}?text=${encodeURIComponent(pesan)}`;
        
        window.open(urlWhatsapp, "_blank");

    }
</script>
