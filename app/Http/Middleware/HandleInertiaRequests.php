<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $authUser = $request->user();

        return array_merge(parent::share($request), [
            'permission' => function () use ($authUser) {
                if (!$authUser) return;

                return [
                    'users' => [
                        'create' => $authUser->can('create', User::class),
                        'viewAny' => $authUser->can('viewAny', User::class),
                        'editRole' => $authUser->hasRole('admin'),
                    ],
                    'posts' => [
                        'create' => $authUser->can('create', Post::class),
                        'viewAny' => $authUser->can('viewAny', User::class),
                    ],
                ];
            },
        ]);
    }
}
