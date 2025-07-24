<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Karyawan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #10375c;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0d2a49;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h2 style="text-align:center;">Form Tambah Karyawan</h2>

    @if ($errors->any())
        <div class="alert">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>

        <label for="jk">Jenis Kelamin</label>
        <select name="jk" id="jk" required>
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">

        <label for="jabatan">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}">

        <label for="tgl">Tanggal Lahir</label>
        <input type="date" name="tgl" id="tgl" value="{{ old('tgl') }}">

        <label for="departemen_id">Departemen</label>
        <select name="departemen_id" id="departemen_id" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach ($departemens as $departemen)
                <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? 'selected' : '' }}>
                    {{ $departemen->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit">Simpan</button>

        <div class="back-link">
            <a href="{{ route('karyawan.index') }}">← Kembali ke Daftar</a>
        </div>
    </form>

</body>
</html>
