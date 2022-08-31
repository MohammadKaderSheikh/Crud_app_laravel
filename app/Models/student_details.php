<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student_details extends Model
{
    public $table='student_details';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;

}
