<?php

namespace Pathology;

use Pathology\Test;
use Pathology\User;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $fillable = ['summary', 'user_id'];

    /**
     * This fetch all tests for this report.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userTests()
    {
        return $this->hasMany('Pathology\Test');
    }

    /**
     * This fetches the user that has the report
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Pathology\User');
    }
}
