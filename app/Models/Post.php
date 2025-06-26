<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $title
 * @property string $body
 * @property string $category
 */
class Post extends Model
{
    protected $guarded = ['id'];
}
