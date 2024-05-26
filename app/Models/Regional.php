<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $table = 'regional';
    protected $primaryKey = 'id_regional';

    protected $fillable = [
        'kode_regional',
        'nama_regional',
        'alamat_regional',
        'nama_kepala_regional',
        'Id_pusat', // pastikan atribut ini ada
    ];

    // Relasi dengan model Pusat
    public function pusat()
    {
        return $this->belongsTo(Pusat::class, 'Id_pusat');
    }
}
