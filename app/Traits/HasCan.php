<?php

namespace App\Traits;

trait HasCan
{
    public function getCanAttribute()
    {
        $authUser = request()->user();

        if ($authUser) {
            return [
                'view' => $authUser->can('view', $this),
                'update' => $authUser->can('update', $this),
                'delete' => $authUser->can('delete', $this),
            ];
        }
    }
}
