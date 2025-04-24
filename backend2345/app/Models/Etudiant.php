<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = [
        'user_id','nom', 'prenom', 'email', 'telephone', 'adresse', 'date_naissance'
    ];
    public function attendances()
{
    return $this->hasMany(Attendance::class);
}
public function filiere() {
    return $this->belongsTo(Filiere::class);
}
public function user()
    {
        return $this->belongsTo(User::class);
    }

}
