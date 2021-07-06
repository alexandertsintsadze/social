<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public function scopeOwn($data, $id) {
        return $data->where('account_id', '=', $id);
    }
}
