<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Perusahaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            padding: 20px;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #10375c;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 20px;
            width: 100%;
            background-color: #10375c;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0d2a49;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Data Perusahaan</h2>
        <form action="{{ route('perusahaan.store') }}" method="POST">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Jenis Kelamin</label>
    <select name="jk" required>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>

    <label>Alamat</label>
    <input type="text" name="alamat" required>

    <label>Jabatan</label>
    <input type="text" name="jabatan" required>

    <label>Tanggal Lahir</label>
    <input type="date" name="tgl" required>

    <button type="submit">Simpan</button>
</form>

    </div>
</body>
</html>
