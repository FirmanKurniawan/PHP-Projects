<?php
global $bulan;
$bulan = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
];

function formatTanggalPelaksanaan(string $tanggal): string
{
    global $bulan;
    $tanggal = explode(' - ', $tanggal);
    $tanggal1 = explode('/', $tanggal[0]);
    $tanggal2 = explode('/', $tanggal[1]);
    $bulan1 = $bulan[(int)$tanggal1[0] - 1];
    $bulan2 = $bulan[(int)$tanggal2[0] - 1];
    $tgl1 = $tanggal1[1];
    $tgl2 = $tanggal2[1];
    if ($bulan1 == $bulan2) {
        $bulan1 = "";
        if ($tgl1 == $tgl2) {
            $tgl1 = "";
        } else {
            $tgl1 = $tgl1 . " ";
        }
    } else {
        $bulan1 = $bulan1 . " ";
        $tgl1 = $tgl1 . " ";
    }
    if ($bulan1 == "" && $tgl1 == "") {
        return $tgl2 . " " . $bulan2;
    } else {
        return $tgl1 . $bulan1 . "- " . $tgl2 . " " . $bulan2;
    }
}

function formatTanggalTerbit(string $tanggal): string
{
    global $bulan;
    $tanggal = explode('/', $tanggal);
    return $tanggal[1] . ' ' . $bulan[(int)$tanggal[0] - 1] . ' ' . $tanggal[2];
}
