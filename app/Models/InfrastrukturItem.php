<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfrastrukturItem extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function infrastruktur()
    {
        return $this->belongsTo(Infrastruktur::class, 'infrastruktur_id');
    }
}
