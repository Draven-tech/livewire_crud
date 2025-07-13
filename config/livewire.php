<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Livewire Layout
    |--------------------------------------------------------------------------
    | This is the critical setting that fixes your error
    */
    'layout' => 'layouts.app',

    /*
    |--------------------------------------------------------------------------
    | Default configuration
    |--------------------------------------------------------------------------
    */
    'class_namespace' => 'App\\Livewire',
    'view_path' => resource_path('views/livewire'),
    'asset_url' => null,
    'app_url' => null,
    'middleware_group' => 'web',
    'temporary_file_upload' => [
        'disk' => null,
        'rules' => ['file', 'max:12288'], // 12MB
    ],
    'manifest_path' => null,
    'back_button_cache' => false,
];