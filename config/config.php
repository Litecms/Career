<?php

return [

    /**
     * Provider.
     */
    'provider' => 'litecms',

    /*
     * Package.
     */
    'package'  => 'career',

    /*
     * Modules.
     */
    'modules'  => [
        'job',
        'resume',
    ],

    'image'    => [

        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        
        'md' => [
            'width'     => '370',
            'height'    => '420',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'lg' => [
            'width'     => '780',
            'height'    => '497',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '800',
            'height'    => '530',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],


    ],
    'job'      => [
        'model'         => 'Litecms\Career\Models\Job',
        'table'         => 'career_jobs',
        'presenter'     => \Litecms\Career\Repositories\Presenter\JobItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'title'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'published', 'title', 'job_type', 'image', 'location', 'details', 'upload_folder'],

        'upload-folder' => '/uploads/career/job',
        'uploads'       => [
            'single'   => ['image'],
            'multiple' => [],
        ],
        'casts'         => [
            'image' => 'array',
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'title' => 'like',
            'job_type',
            'location',
            'published',
        ],
    ],
    'resume'   => [
        'model'         => 'Litecms\Career\Models\Resume',
        'table'         => 'career_resumes',
        'presenter'     => \Litecms\Career\Repositories\Presenter\ResumeItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'name', 'email_id', 'mobile', 'message', 'resume', 'image', 'job_id', 'upload_folder'],

        'upload-folder' => '/uploads/career/resume',
        'uploads'       => [
            'single'   => ['resume', 'image'],
            'multiple' => [],
        ],
        'casts'         => [
            'resume' => 'array',
            'image'  => 'array',
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'email_id',
            'mobile',
            'job_id',
        ],
    ],
];
