<?php

use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('career_jobs')->insert([
            [
                'published'     => 'Yes',
                'slug'          => 'web-developer',
                'title'         => 'Web Developer',
                'user_id'       => '1',
                'job_type'      => 'Developing',
                'location'      => 'Lundon UK',
                'details'       => 'Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem.',
                'image'         => '{"folder":"jobs\\/2016\\/07\\/21\\/123257554\\/image","file":"career2.jpg","caption":"Career2","time":"2016-07-21 12:33:02"}',
                'upload_folder' => 'jobs/2016/07/21/123257554',
                'deleted_at'    => null, 'created_at' => '2016-07-20 11:35:54',
                'updated_at'    => '2016-07-21 12:33:04',
            ],
            [
                'published'     => 'Yes',
                'slug'          => 'web-designer',
                'title'         => 'Web Designer',
                'user_id'       => '1',
                'job_type'      => 'Designing',
                'location'      => 'Lundon UK',
                'details'       => 'Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem.',
                'image'         => '{"folder":"jobs\\/2016\\/07\\/21\\/123243104\\/image","file":"career1.jpg","caption":"Career1","time":"2016-07-21 12:32:51"}',
                'upload_folder' => 'jobs/2016/07/21/123243104',
                'deleted_at'    => null, 'created_at' => '2016-07-20 11:36:53',
                'updated_at'    => '2016-07-21 12:32:54',
            ],

        ]);

        DB::table('career_resumes')->insert([

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/career',
                'name'        => 'Careers',
                'description' => null,
                'icon'        => 'fa fa-briefcase',
                'target'      => null,
                'order'       => 130,
                'status'      => 1,
            ],

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/career/job',
                'name'        => 'Jobs',
                'description' => null,
                'icon'        => 'fa fa-briefcase',
                'target'      => null,
                'order'       => 131,
                'status'      => 1,
            ],

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/career/resume',
                'name'        => 'Resumes',
                'description' => null,
                'icon'        => 'fa fa-file-pdf-o',
                'target'      => null,
                'order'       => 132,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/career/job',
                'name'        => 'Career',
                'description' => null,
                'icon'        => 'icon-briefcase',
                'target'      => null,
                'order'       => 130,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'careers/job',
                'name'        => 'Jobs',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 130,
                'status'      => 1,
            ],

        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'career.job.view',
                'name' => 'View Job',
            ],
            [
                'slug' => 'career.job.create',
                'name' => 'Create Job',
            ],
            [
                'slug' => 'career.job.edit',
                'name' => 'Update Job',
            ],
            [
                'slug' => 'career.job.delete',
                'name' => 'Delete Job',
            ],
        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'key'      => 'career.job.key',
        'name'     => 'Some name',
        'value'    => 'Some value',
        'type'     => 'Default',
        ],
         */
        ]);
    }
}
