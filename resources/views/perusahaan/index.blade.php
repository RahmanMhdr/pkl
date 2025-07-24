<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Perusahaan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #10375c;
            text-align: center;
            margin-bottom: 25px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.08);
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .add-button {
            display: inline-block;
            background-color: #10375c;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .add-button:hover {
            background-color: #0d2a49;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #10375c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        .action-buttons a, .action-buttons form {
            display: inline-block;
            margin-right: 5px;
        }

        .edit-btn {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Perusahaan</h1>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('perusahaan.create') }}" class="add-button">+ Tambah Data</a>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($perusahaans as $perusahaan)
                <tr>
                    <td>{{ $perusahaan->nama }}</td>
                    <td>{{ $perusahaan->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $perusahaan->alamat ?? '-' }}</td>
                    <td>{{ $perusahaan->jabatan ?? '-' }}</td>
                    <td>{{ $perusahaan->tgl ? \Carbon\Carbon::parse($perusahaan->tgl)->format('d-m-Y') : '-' }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('perusahaan.edit', $perusahaan->id) }}" class="edit-btn">Edit</a>
                        <form action="{{ route('perusahaan.destroy', $perusahaan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data perusahaan belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
