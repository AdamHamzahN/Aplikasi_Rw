<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    <div class="container">
        <div class="row">
            <div>
                <a href="{{ url('/datawarga') }}" class="btn btn-info btn-lg mx-auto kembali">Kembali</a>
            </div>

            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>Aduan Warga</h1>
                    </div>
                    <form action="{{ url('aduanwarga/simpan') }}" method="post">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama">Nama :</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="masukan nama anda" required>
                                </div>
                                <div class="form-group">
                                    <label for="aduan">Aduan :</label>
                                    <textarea class="form-control" id="aduan" name="aduan" rows="3" placeholder="Enter text"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                            @csrf
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
