<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'rec_id',
        'dateReceived',
        'Obligation',
        'Disbursement',
        'Dept',
        'Payee',
        'Code',
        'Name',
        'Netdv',
        'Particulars',
        'Status',
        'Transmittedto',
        'Remarks',
        'Released',
        'Check',
        'Issuance',
    ];
}
