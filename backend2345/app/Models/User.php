<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role' // ✅ لازم تكون موجودة هنا باش تقبل التسجيل
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // public function posts(){
    //     return $this->hasMany(Post1::class);
    // }
    public function presences()
{
    return $this->hasMany(Presence::class, 'etudiant_id');
}
    public function filiere()
{
    return $this->belongsTo(Filiere::class);

}
public function etudiant()
{
    return $this->hasOne(\App\Models\Etudiant::class);
}


protected static function booted()
{
    static::created(function ($user) {
        if ($user->role === 'student') {
            \App\Models\Etudiant::create([
                'user_id' => $user->id,
                'nom'     => explode(' ', $user->name)[0] ?? $user->name,
                'prenom'  => explode(' ', $user->name)[1] ?? '',
                'email'   => $user->email,
                'telephone' => null,
                'adresse' => null,
                'date_naissance' => null,
            ]);
        }
    });
}}