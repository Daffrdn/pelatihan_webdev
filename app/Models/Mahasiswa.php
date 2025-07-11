<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mahasiswa extends Model
{
    use HasFactory;

    public $incrementing = false; // non auto-increment
    protected $keyType = 'string'; // tipe primary key string (uuid)

    protected $fillable = ['nama_mahasiswa', 'no_wa', 'prodi_id', 'umur'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}