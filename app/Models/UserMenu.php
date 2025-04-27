<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Menu
     */
    public function menus()
    {
        return $this->belongsTo(Menu::class);
    }
}
