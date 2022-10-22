<?php

function rupiah($angka)
{
    return "Rp " . number_format($angka, 2, ',', '.');
}