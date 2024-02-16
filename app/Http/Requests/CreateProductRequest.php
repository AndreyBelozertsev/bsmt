<?php

namespace App\Http\Requests;

use App\Models\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'model_id' => ['required', 'numeric', 'max:' . Model::max('id')]
        ];
    }

    public function validated($key =null, $dafault = null):array
    {
        $validated = parent::validated($key =null, $dafault = null);
        return array_merge($validated, 
            [
                'user_id' => Auth::user()->id,
                'factory_id'=> Auth::user()->factory?->id,
            ]
        );
    }
}
