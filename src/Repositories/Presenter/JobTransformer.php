<?php

namespace Litecms\Career\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class JobTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Career\Models\Job $job)
    {
        return [
            'id'                => $job->getRouteKey(),
            'title'             => $job->title,
            'job_type'          => $job->job_type,
            'location'          => $job->location,
            'details'           => $job->details,
            'image'             => $job->image,
            'slug'              => $job->slug,
            'published'         => $job->published,
            'status'            => $job->status,
            'user_type'         => $job->user_type,
            'user_id'           => $job->user_id,
            'upload_folder'     => $job->upload_folder,
            'created_at'        => $job->created_at,
            'updated_at'        => $job->updated_at,
            'deleted_at'        => $job->deleted_at,
            'url'              => [
                'public' => trans_url('career/'.$job->getPublicKey()),
                'user'   => guard_url('career/job/'.$job->getRouteKey()),
            ], 
            'status'            => trans('app.'.$job->status),
            'created_at'        => format_date($job->created_at),
            'updated_at'        => format_date($job->updated_at),
        ];
    }
}