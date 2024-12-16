<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'riview_user';
    protected $fillable=[
        'user_id',
        'name',
        'email',
        'rating',
        'review'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
