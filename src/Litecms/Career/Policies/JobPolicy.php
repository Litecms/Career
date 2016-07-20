<?php

namespace Litecms\Career\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Litecms\Career\Models\Job;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the job.
     *
     * @param User $user
     * @param Job $job
     *
     * @return bool
     */
    public function view(User $user, Job $job)
    {
        if ($user->canDo('career.job.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $job->user_id;
    }

    /**
     * Determine if the given user can create a job.
     *
     * @param User $user
     * @param Job $job
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('career.job.create');
    }

    /**
     * Determine if the given user can update the given job.
     *
     * @param User $user
     * @param Job $job
     *
     * @return bool
     */
    public function update(User $user, Job $job)
    {
        if ($user->canDo('career.job.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $job->user_id;
    }

    /**
     * Determine if the given user can delete the given job.
     *
     * @param User $user
     * @param Job $job
     *
     * @return bool
     */
    public function destroy(User $user, Job $job)
    {
        if ($user->canDo('career.job.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $job->user_id;
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
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
