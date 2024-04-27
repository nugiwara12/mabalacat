<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Christian extends Model
{
    protected $fillable = [
        'username', 'email_address', 'section', 'LRN_number', 'subject', 'grade', 'teacher_name', 'print_action'
    ];

    protected static function boot()
{
    parent::boot();

    static::saving(function ($christian) {
        if (is_numeric($christian->grade)) {
            if ($christian->grade < 74 && $christian->grade !== 0) {
                $christian->print_action = '<span style="color: red; font-weight: bold;">INC</span>';
            } elseif ($christian->grade >= 74) {
                $christian->print_action = '<span style="color: green; font-weight: bold;">PASSED</span>';
            } elseif ($christian->grade === 0) {
                $christian->print_action = '<span style="color: red; font-weight: bold;">FAILED</span>';
            }
        }
    });
}

}