<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.career.resume.model.table'))->insert([

        ]);

        DB::table(config('litecms.career.job.model.table'))->insert([
            ['id'              => '1',
                'title'            => 'Site Engineer',
                'company'          => 'Kerala Electrical and Allied Engineering Company',
                'job_type'         => 'Full_time',
                'location'         => 'Kochi, Kerala',
                'salary'           => '15,000/- per month',
                'details'          => 'KEL Jobs 2018: 20 Site Engineer Vacancy for Diploma, B.Tech/B.E Salary 15,000 published on 15th September 2018

On 15/09/2018, KEL announced Job notification to hire candidates who completed Diploma, B.Tech/B.E for the position of Site Engineer.
 District wise requirement: Kollam: 1, Kottayam:1, Ernakulam:1, Kozhikode:1, Malappuram:1, Palakkad:1, Alappuzha;5, Kannur:9.
Age: Above 25 years as on 01-09-2018',
                'responsibilities' => null, 'qualifications' => 'Qualification and Experience: B-Tech Degree in Civil /Mechanical/ Electrical. Preference will be given to Civjl Engineers. 2 years\' Experience in the respective field. Diploma holders retired from reputed Organization having 10yrs of relevant experience.',
                'image'            => '[]',
                'slug'             => 'site-engineer',
                'published'        => 'Yes',
                'status'           => 'Show',
                'last_date'        => '2018-09-26',
                'user_type'        => 'App\\User',
                'user_id'          => '1',
                'created_at'       => '2018-09-21 06:37:58',
                'updated_at'       => '2018-09-21 07:15:09',
                'deleted_at'       => null],
            ['id'              => '2',
                'title'            => 'Medical Scribe-Transcriptionist/Fresher',
                'company'          => 'Tsze Solutions',
                'job_type'         => 'Full_time',
                'location'         => 'Thiruvananthapuram, Kerala',
                'salary'           => '3,50,000 - 7,00,000 a year',
                'details'          => 'Job Summary

Medical Scribes play a vital role in rehumanizing healthcare by handling all the documentation needs of the provider in real-time.

Medical Scribing Specialist is a real-time assistant to the doctors to prepare official information or evidence in the EHR, from the patient\'s visit and by associating with the doctors to remit the peak of well organised or systematic patient care.

Medical Scribing Training is a profound idea in the modern healthcare sector. The emergence of electronically developed Healthcare records, called EHR, made the administrative responsibilities of doctors more time-consuming and drag them away from the real patient healthcare. To reduce excessive documentation, doctors/physician over the country, make use of the assistance of Medical Scribers, which make them concentrate on the actual patient care.',
                'responsibilities' => '<p>Medical Scribing is an organized and well-esteemed fragment of the US Healthcare system. Scribers are the personal assistant who helps the physician to deliver high-quality healthcare session. To make the medical scribing some elements are needed, which explained below.</p><ul><li><b>GOOGLE GLASS</b> - Physician wears a special glass, called Google Glass, which record the audio and video of the Doctor-Patient interaction. Physician wears the Google glass throughout the day. The medical Scribe, from the distant place, get all the information from the doctor-patient live interaction.</li><li><b>REAL-TIME</b>– The Doctor &amp; patient interaction can be viewed by the medical scribe at the time of their consulting. So, the scribe can easily prepare and send the report at the end of the session. The Medical Scribe will be the partner of the physician/doctor for the whole day.</li><li><b>EHR</b>- After the interaction, the doctor &amp; scribe unite to form a document called EHR, otherwise Electronic Health Record about the patient. EHR is nothing but a complete database of the patient so far. It includes the general information, laboratory test results, treatment history, details about drugs and even more.</li></ul>',
                'qualifications'   => 'Any Graduation with good communication skills ready to work with US doctors real time with Google Glass.',
                'image'            => '[]',
                'slug'             => 'medical-scribe-transcriptionistfresher',
                'published'        => 'Yes',
                'status'           => 'Show',
                'last_date'        => '2018-10-05',
                'user_type'        => 'App\\User',
                'user_id'          => '1',
                'created_at'       => '2018-09-21 06:38:03',
                'updated_at'       => '2018-09-21 07:19:22',
                'deleted_at'       => null],
            ['id'              => '3',
                'title'            => 'Web Designer - UX/UI',
                'company'          => 'SignOn',
                'job_type'         => 'Full_time',
                'location'         => 'Calicut, Kerala',
                'salary'           => '35,000 a month',
                'details'          => 'Our firm needs a professional Web Designer with experience in WordPress and other content management platforms to take over the graphic and user interface design of our clients website. We’re looking for a candidate who has created and maintained functional, attractive websites for companies . We want to talk to you if your portfolio includes clean, modern, responsive websites with excellent navigational structures and detailed linking. If you stay current with the latest in web design and development trends, you’d be a great fit for this position.',
                'responsibilities' => '<p>- Able to understand the customer profiles, their needs, behaviors and translate concepts into wire frames and mock ups that lead to intuitive user experiences.</p><p>- Design and deliver wireframes, user stories, user journeys, and mockups for mobile and desktop interfaces.</p><p>- Support marketing and product teams with quick prototyping for product showcase.</p><p>- Work closely with the developers to ensure that releases are in accordance with the design specs.</p><p>- Take ownership of the design from conceptualization to final implementation.</p><p>- Make data driven decisions to iterate on designs as well as conduct interviews with users to understand their pain points.</p>',
                'qualifications'   => '<p>&nbsp;3-5 years of work experience as a UX/UI designer. Experience in enterprise products would be a plus.</p><p>- Has experience in managing/driving user experience for consumer applications or SAAS applications</p><p>- Has experience in designing application with content, editors and dashboards (both mobile andweb)</p><p>- Good understanding of Android material design principles, web design principles. Knowledge of iOS design principles a plus.</p><p>- Strong believer of mobile-first and responsive design.</p><p>- Expertise in UI/UX software - Sketch.</p><p>- Understands the latest in visual and interaction design trends.</p><p>- Attention to detail and a strong bias towards action. For example if the fact that the font size of this sentence is different from what has been used in the rest of the document irks you, do talk to us.</p><p>- Above all should have a strong point of view on the right experience for our users and should be a constant advocate of the same on all forums.</p>',
                'image'            => '[]',
                'slug'             => 'web-designer-uxui',
                'published'        => 'Yes',
                'status'           => 'Show',
                'last_date'        => '2018-10-06',
                'user_type'        => 'App\\User',
                'user_id'          => '1',
                'created_at'       => '2018-09-21 06:38:07',
                'updated_at'       => '2018-09-21 07:22:29',
                'deleted_at'       => null],
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
            [
                'slug' => 'career.resume.view',
                'name' => 'View Resume',
            ],
            [
                'slug' => 'career.resume.create',
                'name' => 'Create Resume',
            ],
            [
                'slug' => 'career.resume.edit',
                'name' => 'Update Resume',
            ],
            [
                'slug' => 'career.resume.delete',
                'name' => 'Delete Resume',
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/career/job',
                'name'        => 'Job',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/career/resume',
                'name'        => 'Resume',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
 
            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'careers',
                'name'        => 'Career',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],
            [
                'parent_id'   => 4,
                'key'         => null,
                'url'         => 'careers',
                'name'        => 'Career',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

       ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'pacakge'   => 'Career',
        'module'    => 'Job',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'career.job.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}
