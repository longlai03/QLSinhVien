<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
    protected $fillable = ['id', 'first_name', 'last_name', 'date_of_birth', 'parent_phone', 'class_id'];
}
