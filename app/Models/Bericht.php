<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bericht extends Model
{
    use HasFactory, CisRowIdTrait;

    public $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function creator() {
        return $this->hasOne(User::class,'cis_row_id','created_by');
    }
}
