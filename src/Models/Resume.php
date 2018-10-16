<?php

namespace Litecms\Career\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Litepie\Database\Model;
use Litepie\Database\Traits\DateFormatter;
use Litepie\Database\Traits\Slugger;
use Litepie\Filer\Traits\Filer;
use Litepie\Hashids\Traits\Hashids;
use Litepie\Repository\Traits\PresentableTrait;
use Litepie\Trans\Traits\Translatable;

class Resume extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, DateFormatter, PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'litecms.career.resume.model';

    public function job()
    {
        return $this->belongsTo('Litecms\Career\Models\Job');
    }
}
