<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoUser extends Model
{
    use HasFactory;

    protected $table = "tipo_users";

    public function User()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
