<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Persona;
use App\Models\TipoUser;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo_users()
    {
        return $this->hasOne(TipoUser::class, 'id', 'tipo_user_id');
    }

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'persona_id');
    }

    public function datos_user()
    {
        $datos = collect(['user_id' => $this->id,
                          'tipo_user_id' => $this->tipo_users->id,
                          'tipo_user' => $this->tipo_users->descripcion,
                          'dni' => $this->persona->dni,
                          'nombre' => $this->persona->nombre,
                          'apellido' => $this->persona->apellido,
                          'email' => $this->persona->email,
                          'telefono' => $this->persona->telefono,
                          'logueado' => true]);

        return $datos;
    }

    public static function index()
    {
        $datos_users = collect([]);
		$users = User::all();
		foreach ($users as $user){
            $datos_users->push($user->datos_user());
		}
		return $datos_users;
    }
}
