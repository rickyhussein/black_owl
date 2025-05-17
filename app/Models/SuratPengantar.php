<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengantar extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getCounter()
    {
        $counter = Counter::where('name', 'Surat Pengantar')->first();
        $counter->update([
            'counter' => $counter->counter + 1
        ]);

        $romawi = [
            'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'
        ];

        $number = str_pad($counter->counter, 4, '0', STR_PAD_LEFT);
        $surat_pengantar_number = $number . "/" . $counter->text_1 . auth()->user()->rt . "-016/" . $romawi[intval(date('m')) - 1] . '/' . date('Y');

        return $surat_pengantar_number;
    }
}
