<?php
// functions.php

// Fungsi mengalkulasi nilai aset gudang (Harga x Stok)
function hitungTotalNilaiStok($products) {
    $total = 0;
    foreach ($products as $product) {
        $total += $product['harga'] * $product['stok'];
    }
    return $total;
}

// Fungsi untuk menandai baris jika stok kritis (< 3)
function dapatkanWarnaBaris($stok) {
    if ($stok < 3) {
        return 'class="stok-kritis"';
    }
    return '';
}