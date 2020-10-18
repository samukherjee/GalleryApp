<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WallpapersUploadRequest extends FormRequest
{
    private $width;
    
    private $height;

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
        list($this->width,$this->height) = getimagesize($this->file('file'));

        return [
            'file' => [
                'bail', 
                'required',
                'image',
                'mimes:jpeg,jpg,png',
                function ($attribute, $value, $fail){
                    $larger_side = max($this->width, $this->height);
                    if ($larger_side <= 1080) {
                        $fail("Wallpaper's width or height must be greater than 1080px.");
                    }
                }
            ],
        ];
    }

    public function messages()
    {
        return [
            'file.image' => 'Only images are acceptable.',
            'file.mimes'  => 'Jpg and png are allowed image extension.'
        ];
    }

    public function validated()
    {
        // Puting width and height Variable values to The array so we use it in controller
        return array_merge(parent::validated(), [
            'width' => $this->width,
            'height' => $this->height
        ]);
    }
}
