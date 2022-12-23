<?php

class Hitung
{
    function __construct(string $nilai)
    {
        $this->nilai = array_filter(explode(' ', $nilai,-1));
    }
    function rataRata()
    {
        return array_sum($this->nilai)/count($this->nilai);
    }
    function nilaiTerbesar()
    {
        return (int)max($this->nilai);
    }
    function nilaiTerkecil()
    {
        return (int)min($this->nilai);
    }
}

$hitung = new Hitung("72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86");
echo "nilai rata-rata : ".$hitung->rataRata();
echo "<br>";
echo "nilai terbesar : ".$hitung->nilaiTerbesar();
echo "<br>";
echo "nilai terkecil : ".$hitung->nilaiTerkecil();
