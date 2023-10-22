<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiltersLine extends Model
{
    protected $fillable = ['filterName','filter_template_id'];
    protected $table = 'filters_lines';
    public function template()
    {
        return $this->belongsTo(FilterTemplate::class);
    }

}
