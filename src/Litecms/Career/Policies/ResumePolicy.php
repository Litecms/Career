<?php

namespace Litecms\Career\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Litecms\Career\Models\Resume;

class ResumePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the resume.
     *
     * @param User $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function view(User $user, Resume $resume)
    {
        if ($user->canDo('career.resume.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $resume->user_id;
    }

    /**
     * Determine if the given user can create a resume.
     *
     * @param User $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('career.resume.create');
    }

    /**
     * Determine if the given user can update the given resume.
     *
     * @param User $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function update(User $user, Resume $resume)
    {
        if ($user->canDo('career.resume.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $resume->user_id;
    }

    /**
     * Determine if the given user can delete the given resume.
     *
     * @param User $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function destroy(User $user, Resume $resume)
    {
        if ($user->canDo('career.resume.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $resume->user_id;
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
