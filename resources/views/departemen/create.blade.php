<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Departemen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f7f8;
        }
        form {
            max-width: 500px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #10375c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0d2a49;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h2 style="text-align:center;">Form Tambah Departemen</h2>

    <form action="{{ route('departemen.store') }}" method="POST">
        @csrf

        <label for="nama">Nama Departemen</label>
        <input type="text" id="nama" name="nama" required>

        <button type="submit">Simpan</button>

        <div class="back-link">
            <a href="{{ route('departemen.index') }}">← Kembali ke Daftar</a>
        </div>
    </form>

</body>
</html>
