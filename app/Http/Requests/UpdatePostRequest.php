<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $post = $this->route()->parameter('post');

        $rules =[
            'name' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id, // esto es para que se pueda guardar en caso de ser el mismo slug
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if($this->status == 2){ // si es 2 es porque va a estar publicado por lo que ponemos estas validaciones
            /* fusiona dos array array_merge */
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
