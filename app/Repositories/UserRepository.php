<?php

namespace Pathology\Repositories;

use Pathology\User;

class UserRepository
{

    public function patients()
    {
        return User::patient()->orderBy('created_at', 'asc')->get();
    }


}