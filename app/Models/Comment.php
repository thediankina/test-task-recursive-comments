<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['content'];

    public static function reformat(string $timestamp): string
    {
        $time = (date('d/m/Y', strtotime($timestamp)) == date('d/m/Y')) ?
            'today at ': date('d/m/Y', strtotime($timestamp)) . ' at ';

        return $time . date('H:i', strtotime($timestamp));
    }
}
