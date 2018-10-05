<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for job in career package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  job module in career package
    | and it is used by the template/view files in this module
    |
     */

    /**
     * Singlular and plural name of the module
     */
    'name'        => 'Job',
    'names'       => 'Jobs',

    /**
     * Singlular and plural name of the module
     */
    'title'       => [
        'main'   => 'Jobs',
        'sub'    => 'Jobs',
        'list'   => 'List of jobs',
        'edit'   => 'Edit job',
        'create' => 'Create new job',
    ],

    /**
     * Options for select/radio/check.
     */
    'options'     => [
        'published' => ['Yes' => 'Yes', 'No' => 'No'],
        'status'    => ['draft' => 'draft', 'published' => 'published', 'hidden' => 'hidden', 'suspended' => 'suspended', 'spam' => 'spam'],
        'job_type'  => ['Full_time' => 'Full_time', 'Part_time' => 'Part_time', 'Contract' => 'Contract'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder' => [
        'id'               => 'Please enter id',
        'title'            => 'Please enter title',
        'company'          => 'Please enter company',
        'job_type'         => 'Please enter job type',
        'location'         => 'Please enter location',
        'salary'           => 'Please enter salary',
        'details'          => 'Please enter details',
        'responsibilities' => 'Please enter responsibilities',
        'qualifications'   => 'Please enter qualifications',
        'image'            => 'Please enter image',
        'slug'             => 'Please enter slug',
        'published'        => 'Please select published',
        'status'           => 'Please select status',
        'last_date'        => 'Please select last_date',
        'user_type'        => 'Please enter user type',
        'user_id'          => 'Please enter user id',
        'created_at'       => 'Please select created at',
        'updated_at'       => 'Please select updated at',
        'deleted_at'       => 'Please select deleted at',
    ],

    /**
     * Labels for inputs.
     */
    'label'       => [
        'id'               => 'Id',
        'title'            => 'Title',
        'company'          => 'Company',
        'job_type'         => 'Job type',
        'location'         => 'Location',
        'salary'           => 'Salary',
        'details'          => 'Details',
        'responsibilities' => 'Responsibilities',
        'qualifications'   => 'Qualifications',
        'image'            => 'Image',
        'slug'             => 'Slug',
        'published'        => 'Published',
        'status'           => 'Status',
        'last_date'        => 'Last_date',
        'user_type'        => 'User type',
        'user_id'          => 'User id',
        'created_at'       => 'Created at',
        'updated_at'       => 'Updated at',
        'deleted_at'       => 'Deleted at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'     => [
        'title'     => ['name' => 'Title', 'data-column' => 1, 'checked'],
        'job_type'  => ['name' => 'Job type', 'data-column' => 2, 'checked'],
        'location'  => ['name' => 'Location', 'data-column' => 3, 'checked'],
        'salary'    => ['name' => 'Salary', 'data-column' => 4, 'checked'],
        'last_date' => ['name' => 'Last_date', 'data-column' => 5, 'checked'],
        'image'     => ['name' => 'Image', 'data-column' => 6, 'checked'],
        'published' => ['name' => 'Published', 'data-column' => 7, 'checked'],
        'status'    => ['name' => 'Status', 'data-column' => 8, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'         => [
        'name' => 'Jobs',
    ],

    /**
     * Texts  for the module
     */
    'text'        => [
        'preview' => 'Click on the below list for preview',
    ],
];
