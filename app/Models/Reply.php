<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function commentuser  ()
    {
        return $this->belongsTo(Commentuser:: class);
    }
    public function user  ()
    {
        return $this->belongsTo(User:: class);
    }
}
