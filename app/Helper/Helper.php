<?php

namespace App\Helper;

function terbilang($number)
{
    $words = [
        '',
        'satu',
        'dua',
        'tiga',
        'empat',
        'lima',
        'enam',
        'tujuh',
        'delapan',
        'sembilan',
        'sepuluh',
        'sebelas',
        'dua belas',
        'tiga belas',
        'empat belas',
        'lima belas',
        'enam belas',
        'tujuh belas',
        'delapan belas',
        'sembilan belas',
    ];

    if ($number < 20) {
        return $words[$number];
    } elseif ($number < 100) {
        return $words[$number / 10] . ' puluh ' . $words[$number % 10];
    } elseif ($number < 200) {
        return 'seratus ' . terbilang($number - 100);
    } elseif ($number < 1000) {
        return $words[$number / 100] . ' ratus ' . terbilang($number % 100);
    } elseif ($number < 2000) {
        return 'seribu ' . terbilang($number - 1000);
    } elseif ($number < 1000000) {
        return terbilang($number / 1000) . ' ribu ' . terbilang($number % 1000);
    } elseif ($number < 1000000000) {
        return terbilang($number / 1000000) .
            ' juta ' .
            terbilang($number % 1000000);
    } elseif ($number < 1000000000000) {
        return terbilang($number / 1000000000) .
            ' miliar ' .
            terbilang($number % 1000000000);
    } elseif ($number < 1000000000000000) {
        return terbilang($number / 1000000000000) .
            ' triliun ' .
            terbilang($number % 1000000000000);
    } else {
        return '';
    }
}
