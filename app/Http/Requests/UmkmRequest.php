<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UmkmRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:business_categories,id'],
            'description' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'business_scale' => ['required', 'in:mikro,kecil,menengah'],
            'sales_channel' => ['required', 'in:offline,online,gabungan'],
            'public_phone' => ['nullable', 'string', 'max:25'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'status' => ['required', 'in:draft,published,archived'],
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama usaha wajib diisi.',
            'category_id.required' => 'Silakan pilih kategori usaha.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'address.required' => 'Alamat lokasi UMKM wajib diisi.',
            'business_scale.required' => 'Pilih skala usaha.',
            'sales_channel.required' => 'Pilih metode penjualan.',
            'photo.image' => 'File foto harus berupa gambar.',
            'photo.max' => 'Ukuran foto maksimal 3MB.',
        ];
    }
}
