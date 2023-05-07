<?php

namespace App\Models;

use App\Mail\Welcome;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class InitialLogin extends Model
{
    use HasFactory;

    public static function welcome(User $user) {
        $init = new InitialLogin();
        $init->cis_row_id_user = $user->cis_row_id;
        $init->code = self::generateCode();
        $init->save();

        return $init;
    }

    public static function reset(User $user) {
        InitialLogin::where('cis_row_id_user',$user->cis_row_id)->delete();
    }

    protected static function generateCode() {
        return strtoupper(\Str::random(4)."-".\Str::random(4)."-".\Str::random(4)."-".\Str::random(4));
    }
}
