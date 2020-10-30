<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name' => 'required',
            'images' => 'nullable|file|mimes:png,jpg,jpeg',
            'price' => 'required|integer|between:500,10000000',
            'category_id' => 'required',
            'description' => 'required',
            'tags.*' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama produk wajib diisi!',
            'images.file' => 'Foto produk harus berupa gambar',
            'images.file' => 'Foto produk harus berupa gambar (png,jpg,jpeg)',
            'price.required' => 'Harga produk wajib diisi!',
            'price.digits_between' => 'Harga produk setidaknya Rp.500 - Rp.10.000.000',
            'category.required' => 'Kategori produk wajib diisi!',
            'description.required' => 'Deskripsi produk wajib diisi!',
        ];
    }
}
