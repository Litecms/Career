<?php

namespace Litecms\Career\Repositories\Presenter;

use League\Fractal\TransformerAbstract;

class ResumeItemTransformer extends TransformerAbstract
{
    public function transform(\Litecms\Career\Models\Resume $resume)
    {
        return [
            'id'       => $resume->getRouteKey(),
            'name'     => ucfirst($resume->name),
            'email_id' => $resume->email_id,
            'mobile'   => $resume->mobile,
            'message'  => ucfirst($resume->message),
            'resume'   => $resume->resume,
            'image'    => $resume->image,
            'job_id'   => $resume->jobs['title'],
        ];
    }
}
