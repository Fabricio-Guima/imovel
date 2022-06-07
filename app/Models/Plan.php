<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['name', 'slug', 'price', 'description'];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
