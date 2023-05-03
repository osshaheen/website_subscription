<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'website_id'=>'required|numeric|exists:websites,id',
            'title'=>'required|string|min:1|max:255|unique:posts,title,null,id,website_id,'.$this->website_id,
            'body'=>'required|string|min:1|max:1000'
        ];
    }
}
