<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'auth' => \App\Filters\AuthFilter::class,
        'guest' => \App\Filters\GuestFilter::class,
    ];

    public $globals = [
        'before' => [
            // 'csrf',
            // 'honeypot',
            // 'invalidchars',
        ],
        'after'  => [
            // 'toolbar',
            // 'honeypot',
            // 'invalidchars',
        ],
    ];

    public $methods = [];

    public $filters = [
        'auth' => ['before' => ['dashboard/*']],
        'guest' => ['before' => ['login', 'register', 'register/*']]
    ];
}
