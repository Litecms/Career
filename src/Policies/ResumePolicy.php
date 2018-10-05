<?php

namespace Litecms\Career\Policies;

use Litepie\User\Contracts\UserPolicy;
use Litecms\Career\Models\Resume;

class ResumePolicy
{

    /**
     * Determine if the given user can view the resume.
     *
     * @param UserPolicy $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function view(UserPolicy $user, Resume $resume)
    {
        if ($user->canDo('career.resume.view') && $user->isAdmin()) {
            return true;
        }

        return $resume->user_id == user_id() && $resume->user_type == user_type();
    }

    /**
     * Determine if the given user can create a resume.
     *
     * @param UserPolicy $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('career.resume.create');
    }

    /**
     * Determine if the given user can update the given resume.
     *
     * @param UserPolicy $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function update(UserPolicy $user, Resume $resume)
    {
        if ($user->canDo('career.resume.edit') && $user->isAdmin()) {
            return true;
        }

        return $resume->user_id == user_id() && $resume->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given resume.
     *
     * @param UserPolicy $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Resume $resume)
    {
        return $resume->user_id == user_id() && $resume->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given resume.
     *
     * @param UserPolicy $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Resume $resume)
    {
        if ($user->canDo('career.resume.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given resume.
     *
     * @param UserPolicy $user
     * @param Resume $resume
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Resume $resume)
    {
        if ($user->canDo('career.resume.approve')) {
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
