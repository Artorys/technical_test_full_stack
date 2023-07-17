<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'description',
        'voltage',
        'brand',
    ];
    protected $casts = [
        'id' => 'integer',
        "name" => 'string',
        'description' => 'string',
        'voltage' => 'string',
        'brand' => 'string'
    ];

    public $timestamps = false;
}
