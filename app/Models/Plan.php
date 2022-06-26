<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['name', 'stripe_id', 'slug', 'price', 'description'];


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }


    //como se fosse um observer para criar um slug
    public function setNameAttribute($prop)
    {
        $this->attributes['name'] = $prop;
        $this->attributes['slug'] = Str::slug($prop);
    }

    //transforma a string formatada com padrao BRL em um inteiro (ex: 1.990,00 para 1990)
    public function setPriceAttribute($prop)
    {
        $price = str_replace(['.', ','], ['', '.'], $prop);
        $this->attributes['price'] = (int) $price * 100;
    }

    // joga para o front o preço formatado em brl (ex: 1990 para 1.990,00)
    public function getPriceAttribute()
    {
        return $this->attributes['price'] / 100;
    }
}
