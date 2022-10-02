<?php


// Convert Binary to Decimal tool

echo "Masukan Nilai Binner : ";
$binner = trim(fgets(STDIN));

//validasi Angka Atau Bukan

if (is_numeric($binner)) {

    $filter_angka = preg_filter('/[0-1]+/', '($0)', $binner);

    // Validasi Angka 0 & 1 saja
    if ($filter_angka == "(" . $binner . ")") {

        //hitung char
        $count = strlen($binner);

        //convert to array intval
        $data  = array_map('intval', str_split(strrev($binner)));

        $hasil_akhir = [];

        echo "Cara Pengerjaannya : \n";

        for ($i = $count - 1; $i >= 0; $i--) {

            $hasil_pangkat = pow(2, $i);
            $hasil_kali_binner = $hasil_pangkat * $data[$i];

            $hasil_akhir[] = $hasil_kali_binner;

            echo $data[$i] . " x 2(" . $i . ") = " . $hasil_kali_binner . "\n";
        }

        $convert_array = implode("+", $hasil_akhir);
        $sum = array_sum($hasil_akhir);

        echo "Jumlahkan = " . $convert_array . "\n";
        echo "Nilai Desimal yang didapat = \e[0;32m" . $sum . "\n";
    } else {

        echo "Maaf Binner hanya berisi nilai 0 &  1";
    }
} else {

    echo "Maaf Nilai yang anda masukan tidak valid";
}