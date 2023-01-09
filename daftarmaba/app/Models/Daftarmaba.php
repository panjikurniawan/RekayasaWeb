<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Daftarmaba extends Model
{

    protected $table = 'daftar_maba';


    protected $fillable = ['Nama_Pendaftar' , 'Tempat_Lahir' , 'Tanggal_Lahir', 'Alamat', 'Jalur_Masuk', 'Prodi', 'Sekolah_Asal', 'No_hp', 'Email'];
    
}