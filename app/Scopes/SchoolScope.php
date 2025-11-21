<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SchoolScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $user = auth()->user();

        if (!$user) {
            return;
        }

        if ($user->role == 1) {
            return;
        }

        $builder->where($model->getTable() . '.school_id', $user->school_id);
    }
}
