<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterTemplate extends Model
{
    protected $fillable = ['nameTemplate','type'];
    protected $table = 'filters_templates';

    public function lines()
    {
        return $this->hasMany(FiltersLine::class, 'filter_template_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
