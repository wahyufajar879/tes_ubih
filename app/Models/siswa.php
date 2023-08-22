<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nim','nama','tanggal_lahir','alamat','id_jeniskelamin'];

    public $timestamps = false;

    public function jeniskelamin()
    {
        return $this->belongsTo(jeniskelamin::class, 'id_jeniskelamin');
    }
}
