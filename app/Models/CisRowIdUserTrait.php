<?php
namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

trait CisRowIdUserTrait {
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            if(!$model->password) {
                $model->password = Hash::make(Str::random(14));
            }
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getKeyName() {
        return 'cis_row_id';
    }
}
