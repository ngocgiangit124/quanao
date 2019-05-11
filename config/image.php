<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',
    'images' => array(
        "sanphams" => array("150x150","300x300"),
        "slides" => array("150x233","150x233",'450x800'),
//        "eventNews" => array("200x200","400x400","800x800")
    ),
    'image_root' => env('IMAGE_ROOT'),
    'image_url' => env('IMAGE_URL'),

);
