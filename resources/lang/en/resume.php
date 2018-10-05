<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for resume in career package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  resume module in career package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Resume',
    'names'         => 'Resumes',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Resumes',
        'sub'   => 'Resumes',
        'list'  => 'List of resumes',
        'edit'  => 'Edit resume',
        'create'    => 'Create new resume'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'published'           => ['Yes','No'],
            'status'              => ['draft','published','hidden','suspended','spam'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'name'                       => 'Please enter name',
        'email'                      => 'Please enter email',
        'mobile'                     => 'Please enter mobile',
        'message'                    => 'Please enter message',
        'resume'                     => 'Please enter resume',
        'image'                      => 'Please enter image',
        'job_id'                     => 'Please enter job id',
        'slug'                       => 'Please enter slug',
        'published'                  => 'Please select published',
        
        'uploaded_folder'            => 'Please enter uploaded folder',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
        'deleted_at'                 => 'Please select deleted at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'name'                       => 'Name',
        'email'                      => 'Email',
        'mobile'                     => 'Mobile',
        'message'                    => 'Message',
        'resume'                     => 'Resume',
        'image'                      => 'Image',
        'job_id'                     => 'Job id',
        'slug'                       => 'Slug',
        'published'                  => 'Published',
        
        
        'uploaded_folder'            => 'Uploaded folder',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'deleted_at'                 => 'Deleted at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'name'                       => ['name' => 'Name', 'data-column' => 1, 'checked'],
        'email'                      => ['name' => 'Email', 'data-column' => 2, 'checked'],
        'mobile'                     => ['name' => 'Mobile', 'data-column' => 3, 'checked'],
        'message'                    => ['name' => 'Message', 'data-column' => 4, 'checked'],
        'resume'                     => ['name' => 'Resume', 'data-column' => 5, 'checked'],
        'image'                      => ['name' => 'Image', 'data-column' => 6, 'checked'],
        'job_id'                     => ['name' => 'Job id', 'data-column' => 7, 'checked'],
        'published'                  => ['name' => 'Published', 'data-column' => 8, 'checked'],
        'status'                     => ['name' => 'Status', 'data-column' => 9, 'checked'],
        'uploaded_folder'            => ['name' => 'Uploaded folder', 'data-column' => 10, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Resumes',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
