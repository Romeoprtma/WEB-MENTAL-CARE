<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meditasi extends Model
{
    use HasFactory;

    protected $table = 'meditasi';

    protected $fillable = [
        'title',
        'description',
        'category',
        'audio_file',
        'duration',
        'created_by',
        'approved_by',
        'is_approved',
        'status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function getFormattedDurationAttribute()
    {
        return gmdate("i:s", $this->duration);
    }
}
