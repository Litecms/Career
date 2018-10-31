<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'litecms',

    /*
     * Package.
     */
    'package'   => 'career',

    /*
     * Modules.
     */
    'modules'   => ['resume', 
'job'],

    'resume'       => [
        'model' => [
            'model'                 => \Litecms\Career\Models\Resume::class,
            'table'                 => 'career_resumes',
            'presenter'             => \Litecms\Career\Repositories\Presenter\ResumePresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'createdat', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'name',  'email',  'mobile',  'message',  'resume',  'image',  
                                        'job_id',    'published',     'uploaded_folder',  'created_at',  
                                        'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'career/resume',
            'uploads'               => [
            
                    'image' => [
                        'count' => 1,
                        'type'  => 'image',
                    ],
                    'resume' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'image'    => 'array',
                'resume'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
                'job_id' =>'like',
                'email' =>'like',
                'mobile' =>'like',

            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Career',
            'module'    => 'Resume',
        ],

    ],

    'job'       => [
        'model' => [
            'model'                 => \Litecms\Career\Models\Job::class,
            'table'                 => 'career_jobs',
            'presenter'             => \Litecms\Career\Repositories\Presenter\JobPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'title'],
            'dates'                 => ['deleted_at', 'createdat', 'updated_at', 'last_date'],
            'appends'               => [],
            'fillable'              => ['id',  'title',  'company', 'job_type',  'location', 'salary', 'details',  'responsibilities', 'qualifications', 'image',  'slug',  'published',  'last_date',  'user_type',  'user_id',   'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'career/job',
            'uploads'               => [
            
                    'image' => [
                        'count' => 1,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'image'    => 'array',
                'file'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'title'  => 'like',
                'published'=> 'like',
                'job_type'=> 'like',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Career',
            'module'    => 'Job',
        ],

    ],
];
