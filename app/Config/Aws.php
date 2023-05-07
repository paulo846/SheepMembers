<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Aws extends BaseConfig
{
    public $credentials = [
        'key'    => 'AKIAZXNJYHISLK6MOI6P',
        'secret' => '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',
    ];
    
    public $region = 'us-east-1';
    public $bucket = 'sheepmembers';
}
