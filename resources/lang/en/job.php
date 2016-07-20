<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'        => 'Job',
    'names'       => 'Jobs',

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
