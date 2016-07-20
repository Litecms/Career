<?php

namespace Litecms\Career\Http\Requests;

use App\Http\Requests\Request as FormRequest;
use Illuminate\Http\Request;
use Gate;

class JobAdminApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $job = $this->route('job');

        if (is_null($job)) {
            // Determine if the user is authorized to access job module,
            return $request->user('admin.api')->canDo('career.job.view');
        }

        if ($request->isMethod('POST') || $request->is('*/create')) {
            // Determine if the user is authorized to create an entry,
            return $request->user('admin.api')->can('create', $job);
        }

        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/edit')) {
            // Determine if the user is authorized to update an entry,
            return $request->user('admin.api')->can('update', $job);
        }

        if ($request->isMethod('DELETE')) {
            // Determine if the user is authorized to delete an entry,
            return $request->user('admin.api')->can('delete', $job);
        }

        // Determine if the user is authorized to view the module.
        return $request->user('admin.api')->can('view', $job);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->isMethod('POST')) {
            // validation rule for create request.
            return [
                
            ];
        }

        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            // Validation rule for update request.
            return [
                
            ];
        }

        // Default validation rule.
        return [

        ];
    }
}
