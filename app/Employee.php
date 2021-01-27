<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['company_id', 'name', 'lastname', 'email', 'phone'];

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
