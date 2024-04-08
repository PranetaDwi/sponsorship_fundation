<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartisipantCategory extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'partisipant_category_name_id'];
}
