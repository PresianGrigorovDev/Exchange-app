<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Rates extends Model
{
    use HasFactory, FilterQueryString, Sortable;

    protected $filters = [
        'like',
    ];

    public $sortable =[
        'id',
        'name',
        'value'
    ];

}
