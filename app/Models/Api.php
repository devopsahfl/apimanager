<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $table = 'api_management';
    protected $primaryKey = 'srNo';
    protected $fillable = ['proccessName', 'apiTitle', 'apiType', 'apiUrl', 'tokenType', 'token', 'intApi', 'status','applicationManager'];
}
