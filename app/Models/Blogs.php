<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table='blog';
    protected $fillable=['title','body','img','user_id','archive'];

    protected $with=['users'];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
