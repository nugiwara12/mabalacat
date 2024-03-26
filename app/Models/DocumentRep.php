<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRep extends Model
{
    use HasFactory;

    protected $table = 'document_reps';

    protected $fillable = [
        'Fname',
        'Lname',
        'email_address',
        'Phone_number',
        'Role'
    ];
}
