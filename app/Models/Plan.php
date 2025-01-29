<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_type',
        'discount_name',
        'discount',
        'validity',
        'image',
        'color',
        'active',
    ];

    public function benefits()
    {
        return $this->hasMany(PlanBenefits::class, 'plan_id', 'id');
    }
}
