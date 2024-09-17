<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h3><?= $title ?></h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Jumlah Rusak</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($laporan as $nama_barang => $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $nama_barang; ?></td>
                    <td><?= $item['kategori']; ?></td>
                    <td><?= $item['stok']; ?></td>
                    <td><?= $item['satuan']; ?></td>
                    <td><?= $item['masuk']; ?></td>
                    <td><?= $item['keluar']; ?></td>
                    <td><?= $item['rusak']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
