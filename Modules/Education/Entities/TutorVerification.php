<?php

namespace Modules\Education\Entities;

use Illuminate\Database\Eloquent\Model;

class TutorVerification extends Model
{

    protected $fillable = [];

    public function files()
    {
    return $this->hasMany('Modules\Education\Entities\TutorVerificationFile', 'Tutor_verification_id', 'id');
    }
    
    
}
