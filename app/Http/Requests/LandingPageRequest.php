<?php

namespace LandingPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LandingPageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole('manager');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $slug = $this->has('slug') ? str_slug($this->name) : 'index';

        return [
            'client' => 'required|integer',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'domain' => 'required|unique:landing_pages,domain,'. $this->id .',id,slug,' . $slug,
            'file.*' => 'file',
        ];
    }
}
