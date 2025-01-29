<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanBenefits extends Model
{
    protected $table = 'plan_benefits';

    protected $fillable = [
        'plan_id',
        'title',
        'description'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }
}
