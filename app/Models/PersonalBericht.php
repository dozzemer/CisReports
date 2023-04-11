<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalBericht extends Model
{
    use HasFactory, CisRowIdTrait;

    public function personal() {
        return $this->hasOne(User::class,'cis_row_id','user');
    }

}
