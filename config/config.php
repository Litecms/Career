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
    'modules'  => ['job', 'resume'],

    'job'      => [
        'model'         => 'Litecms\Career\Models\Job',
        'table'         => 'career_jobs',
        'presenter'     => \Litecms\Career\Repositories\Presenter\JobItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'title', 'job_type', 'location', 'details'],
        'translate'     => ['title', 'job_type', 'location', 'details'],

        'upload-folder' => '/uploads/career/job',
        'uploads'       => [
            'single'   => [],
            'multiple' => [],
        ],
        'casts'         => [
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
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
        'fillable'      => ['user_id', 'name', 'email_id', 'mobile', 'message', 'resume', 'image', 'job_id'],
        'translate'     => ['name', 'email_id', 'mobile', 'message', 'resume', 'image', 'job_id'],

        'upload-folder' => '/uploads/career/resume',
        'uploads'       => [
            'single'   => [],
            'multiple' => [],
        ],
        'casts'         => [
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
];
