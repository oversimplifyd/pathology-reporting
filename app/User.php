<?php

namespace Pathology;

use Pathology\Report;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = ['name', 'gender', 'dob', 'patient_id', 'pass_code', 'phone_number'];

    /**
     * This fetch the reports for this user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports()
    {
        return $this->hasMany('Pathology\Report');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePatient($query)
    {
        return $query->where('role', 0);
    }

    /**
     * Determines if a user is an operator or not.
     * @param User $user
     * @return bool
     */
    public function isOperator()
    {
        return $this->role == 1;
    }

}
