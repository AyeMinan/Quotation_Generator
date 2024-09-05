<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Quotation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'service', 'project_requirements', 'budget_range' , 'timeframe', 'additional_options', 'estimated_cost'];
}
