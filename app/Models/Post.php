<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Массив атрибутов
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'full_description',
        'short_description',
        'tag',
        'photo',
        'user_id'
    ];

    /**
     * Связь с таблицой users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
