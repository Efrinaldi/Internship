<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use Modules\Auth\Filters\AuthFilter;
use App\Filters\LoginFilter;
use App\Filters\Cors;


class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'cors'      => Cors::class,
        'loginFilter'=> LoginFilter::class,
        'auth_jwt' => JWTAuthenticationFilter::class, // add this line
        'isDriver'      => \App\Filters\DriverFilter::class,
        'isAdmin'       => \App\Filters\AdminFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'cors',
            // 'honeypot',
            // 'csrf',
           
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'loginFilter' => ['before' =>  ['dashboard/*']],
        // 'auth' => [
        //     'before' => [
        //         'client/*',
        //         'client', 
        //     ],
        // ],
        'isAdmin' => ['before' =>
        [
            'reimburse/approve',
        ]],
        'isDriver' => ['before' =>
        [
            'reimburse/list',
        ]],
    ];
}