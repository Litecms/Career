<?php

return [

    /**
     * Singlular and plural name of the module
     */

    'name'        => 'Job',
    'names'       => 'Jobs',
    'user_name'   => 'My <span>Job</span>',
    'user_names'  => 'My <span>Jobs</span>',
    'title'       => 'Job vacancies <span>in my company</span>',
    'create'      => 'New opening in our company',
    'edit'        => 'Update Job vacancy &nbsp;',

    /**
     * Options for select/radio/check.
     */
    'options'     => [

        'job_type' => ['Developing' => 'Developing', 'Designing' => 'Designing', 'Testing' => 'Testing'],

    ],

    /**
     * Placeholder for inputs
     */
    'placeholder' => [
        'title'    => 'Please enter title',
        'job_type' => 'Please enter job type',
        'location' => 'Please enter location',
        'details'  => 'Please enter details',
    ],

    /**
     * Labels for inputs.
     */
    'label'       => [
        'title'      => 'Title',
        'job_type'   => 'Job type',
        'location'   => 'Location',
        'details'    => 'Details',
        'status'     => 'Status',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ],

    /**
     * Tab labels
     */
    'tab'         => [
        'name' => 'Name',
    ],

    /**
     * Texts  for the module
     */
    'text'        => [
        'preview' => 'Click on the below list for preview',
    ],
];
