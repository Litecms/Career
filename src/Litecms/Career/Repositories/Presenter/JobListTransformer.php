<?php

namespace Litecms\Career\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class JobListTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Career\Models\Job $job)
    {
        return [
            'id'        => $job->getRouteKey(),
            'title'     => ucfirst($job->title),
            'published' => $job->published,
            'image'     => $job->image,
            'job_type'  => ucfirst($job->job_type),
            'location'  => ucfirst($job->location),
            'details'   => ucfirst($job->details),
            'published'  => ($job->published == 'Yes') ? 'Published' : '-',
        ];
    }
}
