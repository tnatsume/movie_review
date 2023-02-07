<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'company_logo',
        'company_name',
        'company_zip_code',
        'company_address',
        'company_tel',
        'company_fax',
        'company_url',
        'company_other',

        'personal_name',
        'personal_roll',
        'personal_email',
        'personal_tel',
    ];
}
