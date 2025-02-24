<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may configure the default filesystem disk that should be used by
    | your application. You can choose any of the disks defined in the "disks"
    | array below. The default disk is "local" unless specified otherwise.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | File System Disks
    |--------------------------------------------------------------------------
    |
    | Laravel supports a variety of file storage mechanisms. You may configure
    | each disk that your application uses here. By default, Laravel is set
    | up to store files locally on the server, but you may configure other
    | disks such as S3, FTP, etc.
    |
    */

    'disks' => [

        /*
        |--------------------------------------------------------------------------
        | Local Filesystem Disk
        |--------------------------------------------------------------------------
        |
        | The "local" disk is the default file storage location. It stores files
        | in the `storage/app` directory. Typically, this will be used for
        | storing files that are not publicly accessible.
        |
        */

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        /*
        |--------------------------------------------------------------------------
        | Public Filesystem Disk
        |--------------------------------------------------------------------------
        |
        | The "public" disk stores files in the `storage/app/public` directory
        | and makes them accessible from the web via the `storage` directory
        | in the public folder. This disk is typically used for user-uploaded
        | files that should be publicly accessible.
        |
        */

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        /*
        |--------------------------------------------------------------------------
        | Amazon S3 Filesystem Disk
        |--------------------------------------------------------------------------
        |
        | If you want to store files on Amazon S3, you may configure this disk.
        | Laravel uses the Flysystem library to provide a simple, unified API
        | for working with various storage backends. You can set up your S3
        | credentials in the `config/services.php` configuration file.
        |
        */

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        /*
        |--------------------------------------------------------------------------
        | FTP Filesystem Disk
        |--------------------------------------------------------------------------
        |
        | If you want to store files on an FTP server, you can configure it here.
        | The FTP driver also uses the Flysystem library to provide integration.
        |
        */

        'ftp' => [
            'driver' => 'ftp',
            'host' => env('FTP_HOST'),
            'username' => env('FTP_USERNAME'),
            'password' => env('FTP_PASSWORD'),
            'root' => env('FTP_ROOT'),
            'visibility' => 'public',
        ],

        /*
        |--------------------------------------------------------------------------
        | SFTP Filesystem Disk
        |--------------------------------------------------------------------------
        |
        | If you want to store files on an SFTP server, you can configure it here.
        |
        */

        'sftp' => [
            'driver' => 'sftp',
            'host' => env('SFTP_HOST'),
            'username' => env('SFTP_USERNAME'),
            'password' => env('SFTP_PASSWORD'),
            'root' => env('SFTP_ROOT'),
            'visibility' => 'public',
        ],

    ],

];