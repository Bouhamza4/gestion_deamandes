<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['demande_id', 'admin_id', 'message'];

    public function demande() { return $this->belongsTo(Demande::class); }
    public function admin() { return $this->belongsTo(User::class, 'admin_id'); }
}
