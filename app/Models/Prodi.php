<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_prodi'];

    public $incrementing = false; // non-auto increment
    protected $keyType = 'string'; // karena UUID adalah string

    // Generate UUID saat membuat model baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }    

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }

}