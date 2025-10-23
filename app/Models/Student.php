<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'email',
        'birth_date',
        'section_id'
    ];

    // Proper way to handle dates
    protected $casts = [
        'birth_date' => 'date',
    ];

    // Student belongs to a section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
