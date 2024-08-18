<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Spatie\Image\Image;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:general_categories,category_id',
            'out_category' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'order' => 'nullable|integer',
        ];
    }

    public function prepareForValidation()
    {
        // Resim işleme işlemini burada yap
        if ($this->hasFile('image')) {
            $imageFile = $this->file('image');
            $destinationPath = storage_path('app/public/category');
            $imageName = 'resized-' . time() . '.jpg';
            $thumbName = 'thumb-' . time() . '.jpg';

            // Orijinal resmi işleyip kaydet
            Image::load($imageFile->getRealPath())
                ->width(300)
                ->height(300)
                ->save($destinationPath . '/' . $imageName);

            // Thumbnail (küçük resim) oluştur ve kaydet
            Image::load($imageFile->getRealPath())
                ->width(100)
                ->height(80)
                ->save($destinationPath . '/' . $thumbName);

            // Resim adını request'e ekle
            $this->merge(['image_name' => $thumbName]);
        }
    }


    private function throwValidationException($message)
    {
        throw ValidationException::withMessages([
            'image' => $message,
        ]);
    }
}
