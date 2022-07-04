<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'address',
        'number',
        'complement',
        'district',
        'commercial_district',
        'city',
        'state',
        'state_abbreviation',
        'cep'
    ];

    //1 to 1
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
