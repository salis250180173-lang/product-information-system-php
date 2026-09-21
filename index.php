<?php
// index.php
require_once 'products.php';
require_once 'functions.php';

$totalNilaiAset = hitungTotalNilaiStok($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f8fb;
            color: #2c3e50;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #2b5b84;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 8px;
        }

        th {
            background-color: #4a90e2; /* Biru Soft Utama */
            color: white;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e1e9f0;
            font-size: 14px;
        }

        /* Warna selang-seling baris tabel (Soft Blue Tint) */
        tbody tr:nth-child(even) {
            background-color: #f7fafc;
        }

        /* Penanda Stok Kritis (Merah Soft) */
        tr.stok-kritis {
            background-color: #ffe6e6 !important;
            color: #d9534f;
            font-weight: 500;
        }

        .total-box {
            background-color: #eaf2fa; /* Biru Soft Latar Belakang Total */
            border-left: 5px solid #4a90e2;
            padding: 15px;
            border-radius: 4px;
            font-size: 16px;
            color: #1e3a5f;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Product Information System</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $item): ?>
                    <tr <?= dapatkanWarnaBaris($item['stok']); ?>>
                        <td><?= $item['id']; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['kategori']; ?></td>
                        <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td><?= $item['stok']; ?></td>
                        <td><?= $item['deskripsi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-box">
            <strong>Total Nilai Stok:</strong> Rp <?= number_format($totalNilaiAset, 0, ',', '.'); ?>
        </div>
    </div>

</body>
</html>