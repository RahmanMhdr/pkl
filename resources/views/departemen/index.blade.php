<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Departemen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #10375c;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .add-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #10375c;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .add-btn:hover {
            background-color: #0d2a49;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #10375c;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .action-buttons a, .action-buttons form {
            display: inline-block;
        }

        .edit-btn {
            color: white;
            background-color: #28a745;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Departemen</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('departemen.create') }}" class="add-btn">+ Tambah Departemen</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departemens as $departemen)
                    <tr>
                        <td>{{ $departemen->id }}</td>
                        <td>{{ $departemen->nama }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('departemen.edit', $departemen->id) }}" class="edit-btn">Edit</a>
                            <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;">Belum ada data departemen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
