<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Quotation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'service', 'number_of_pages', 'target_market' , 'keywords', 'ad_budget', 'estimated_cost'];
}
