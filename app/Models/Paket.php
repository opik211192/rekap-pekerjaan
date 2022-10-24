<?php

namespace App\Models;

use App\Models\Bangunan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravolt\Indonesia\Models\Province;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bangunans()
    {
        return $this->hasMany(Bangunan::class);
    }

    public function bangunanProvince()
    {
        return $this->hasOneThrough(Province::class, Bangunan::class);
    }
}
