<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAHP extends Model
{
    use HasFactory;

    protected $table = 'hasil_ahp';

    protected $fillable = ['siswa_id', 'skor_akhir', 'ranking'];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}