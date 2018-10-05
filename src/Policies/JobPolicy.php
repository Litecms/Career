<?php

namespace Litecms\Career\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Career\Models\Job;

class JobPolicy
{

    /**
     * Determine if the given user can view the job.
     *
     * @param UserPolicy $user
     * @param Job $job
     *
     * @return bool
     */
    public function view(UserPolicy $user, Job $job)
    {
        if ($user->canDo('career.job.view') && $user->isAdmin()) {
            return true;
        }

        return $job->user_id == user_id() && $job->user_type == user_type();
    }

    /**
     * Determine if the given user can create a job.
     *
     * @param UserPolicy $user
     * @param Job $job
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('career.job.create');
    }

    /**
     * Determine if the given user can update the given job.
     *
     * @param UserPolicy $user
     * @param Job $job
     *
     * @return bool
     */
    public function update(UserPolicy $user, Job $job)
    {
        if ($user->canDo('career.job.edit') && $user->isAdmin()) {
            return true;
        }

        return $job->user_id == user_id() && $job->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given job.
     *
     * @param UserPolicy $user
     * @param Job $job
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Job $job)
    {
        return $job->user_id == user_id() && $job->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given job.
     *
     * @param UserPolicy $user
     * @param Job $job
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Job $job)
    {
        if ($user->canDo('career.job.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given job.
     *
     * @param UserPolicy $user
     * @param Job $job
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Job $job)
    {
        if ($user->canDo('career.job.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
