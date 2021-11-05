<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable=['body','identyfier'];


    public function user () {
        return $this->belongsTo(User::class);
    }
}
