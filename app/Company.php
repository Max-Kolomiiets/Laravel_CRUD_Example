<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = [ 'name', 'email', 'phone', 'website', 'logo'];

    public function employees() {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
