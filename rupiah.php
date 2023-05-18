<?php
/**
 * Menampilkan format rupiah dengan PHP.
 *
 */
function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
    return $hasil;
}