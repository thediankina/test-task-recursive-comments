<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'comment';

    /**
     * @var array
     */
    protected $fillable = ['id_parent', 'content'];

    /**
     * @return hasMany
     */
    public function replies(): hasMany
    {
        return $this->hasMany(Comment::class, 'id_parent', 'id')->orderBy('id', 'desc');
    }
}
