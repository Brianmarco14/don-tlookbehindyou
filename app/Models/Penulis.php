<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;
    protected $table = 'penulis';
    protected $guarded = ['id'];

    public function cerita()
    {
        return $this->hasMany(Cerita::class);
    }

}
