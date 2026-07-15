<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Detail Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4"><i class="bi bi-person-badge-fill"></i> Detail Mahasiswa</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <table class="table table-borderless mb-0">
                <tr><th style="width:150px">NIM</th><td>: {{ $mahasiswa->nim }}</td></tr>
                <tr><th>Nama</th><td>: {{ $mahasiswa->nama }}</td></tr>
                <tr><th>Jurusan</th><td>: {{ $mahasiswa->jurusan }}</td></tr>
                <tr><th>Angkatan</th><td>: {{ $mahasiswa->angkatan }}</td></tr>
                <tr><th>Email</th><td>: {{ $mahasiswa->email ?? '-' }}</td></tr>
            </table>
        </div>
    </div>

    <h4 class="mb-3"><i class="bi bi-bar-chart-fill"></i> Daftar Nilai</h4>
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa->nilais as $n)
                    <tr>
                        <td>{{ $n->mata_kuliah }}</td>
                        <td>{{ $n->nilai }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-muted">Belum ada nilai</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <a href="/mahasiswa" class="btn btn-secondary mt-4">← Kembali</a>
</div>

</body>
</html>