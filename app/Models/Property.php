<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $filalble = [
        'tenant_id',
        'type_id',
        'action_id',
        'subtype_id',
        'address_id',
        'total_bathrooms',
        'total_area',
        'total_suites',
        'total_garages',
        'sale_value',
        'condo',
        'iptu_value',
        'description'
    ];

    //relationship

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }

    //1 to 1
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
