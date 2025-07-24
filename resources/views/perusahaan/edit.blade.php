<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Data Perusahaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #10375c;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .btn {
            display: inline-block;
            background-color: #10375c;
            color: white;
            padding: 10px 20px;
            border: none;
            margin-top: 20px;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        .btn:hover {
            background-color: #0d2a49;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #10375c;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Perusahaan</h2>

        <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $perusahaan->nama) }}" required>

            <label>Jenis Kelamin</label>
            <select name="jk" required>
                <option value="L" {{ $perusahaan->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $perusahaan->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>

            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $perusahaan->alamat) }}" required>

            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $perusahaan->jabatan) }}" required>

            <label>Tanggal Lahir</label>
            <input type="date" name="tgl" value="{{ old('tgl', $perusahaan->tgl) }}" required>

            <button type="submit" class="btn">Simpan Perubahan</button>
        </form>

        <a href="{{ route('perusahaan.index') }}" class="back-link">← Kembali ke Daftar</a>
    </div>
</body>
</html>
