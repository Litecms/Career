<?php

namespace Litecms\Career\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ResumeTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Career\Models\Resume $resume)
    {
        return [
            'id'                => $resume->getRouteKey(),
            'name'              => $resume->name,
            'email'             => $resume->email,
            'mobile'            => $resume->mobile,
            'message'           => $resume->message,
            'resume'            => $resume->resume,
            'image'             => $resume->image,
            'job_id'            => @$resume->job->title,
            'slug'              => $resume->slug,
            'published'         => $resume->published,
            'status'            => $resume->status,
            'user_id'           => $resume->user_id,
            'user_type'         => $resume->user_type,
            'uploaded_folder'   => $resume->uploaded_folder,
            'created_at'        => $resume->created_at,
            'updated_at'        => $resume->updated_at,
            'deleted_at'        => $resume->deleted_at,
            'url'              => [
                'public' => trans_url('career/'.$resume->getPublicKey()),
                'user'   => guard_url('career/resume/'.$resume->getRouteKey()),
            ], 
            'status'            => trans('app.'.$resume->status),
            'created_at'        => format_date($resume->created_at),
            'updated_at'        => format_date($resume->updated_at),
        ];
    }
}