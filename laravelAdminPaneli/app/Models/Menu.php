<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table ='menuler';
    protected $fillable = [
        'menu_adi',
        'menu_fiyat',
        'menu_icerik',
        'menu_foto'
    ];

    public function kategori()
{
    return $this->belongsTo(Kategori::class);
}
}
