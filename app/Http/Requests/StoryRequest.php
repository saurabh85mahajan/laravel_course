<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $storyId = $this->route('story.id');
        return [
            'title' => ['required', 'min:10', 'max:50',
            function ($attribute, $value, $fail) {
                if ($value == 'Dummy Title') {
                    $fail($attribute . ' is not Valid');
                }
            },
            Rule::unique('stories')->ignore($storyId)
        ],
            'body' => ['required', 'min:50'],
            'type' => 'required',
            'status' => 'required',
            'image' => 'sometimes|mimes:jpeg,jpg,png'
        ];
    }

    public function withValidator($v)
    {
        $v->sometimes('body', 'max:200', function ($input) {
            return 'short' == $input->type;
        });
    }

    public function messages()
    {
        return [
            'title.required' => 'You must enter :attribute',
            'required' => 'Please enter :attribute',
        ];
    }
}
