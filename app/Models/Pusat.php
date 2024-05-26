<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pusat extends Model
{
    use HasFactory;

    protected $table = 'pusat';
    protected $primaryKey = 'id_pusat';

    protected $fillable = [
        'kode_pusat',
        'nama_pusat',
        'alamat_pusat',
        'nama_kepala_pusat',
    ];

    // Relasi dengan model Regional
    public function regionals()
    {
        return $this->hasMany(Regional::class, 'Id_pusat');
    }
}
