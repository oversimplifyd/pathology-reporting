<?php

namespace Pathology;

use Pathology\Report;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    protected $fillable = ['description', 'purpose', 'result', 'received_at', 'completed_at'];
    /**
     * This fetch the report this tests belongs to.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo('Pathology\Report');
    }
}
