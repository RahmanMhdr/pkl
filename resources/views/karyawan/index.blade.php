<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Karyawan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7f8;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #10375c;
            margin-bottom: 25px;
        }

        .add-button {
            background-color: #10375c;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }

        .add-button:hover {
            background-color: #0d2a49;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px 14px;
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

        .edit-btn, .delete-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .text-center {
            text-align: center;
        }
    </style>

    <script>
        function confirmDelete(form) {
            if (confirm('Apakah Anda yakin ingin menghapus data karyawan ini?')) {
                form.submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Data Karyawan</h1>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('karyawan.create') }}" class="add-button">+ Tambah Data</a>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Tanggal Lahir</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $karyawan->alamat ?? '-' }}</td>
                        <td>{{ $karyawan->jabatan ?? '-' }}</td>
                        <td>{{ $karyawan->tgl ? \Carbon\Carbon::parse($karyawan->tgl)->format('d-m-Y') : '-' }}</td>
                        <td>{{ $karyawan->departemen->nama ?? '-' }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="event.preventDefault(); confirmDelete(this);">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
