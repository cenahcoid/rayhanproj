<?php

class Ora extends SENE_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo 'Thank you for using Seme Oraora';
    }
    public function nen($type, $edge, $man)
    {
        $anggota = array();
        $anggota[] = 'Sandi';
        $anggota[] = 'Ruli';
        $anggota[] = 'Iqbal';
        $anggota['ora'] = 'Benimaru';
        $anggota['muda'] = 'Dio';

        foreach ($anggota as $kunci) {
            //cara echo nya
            echo $kunci."<br>";
            // akan menampilkan semua isi dari nilai array anggota
            // tanpa harus mengetahui kunci arraynya
        }
    }
}
