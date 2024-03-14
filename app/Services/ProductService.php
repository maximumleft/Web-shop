<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            if (isset($data['tags'])) {
                $tagIds = $data['tags'];
                unset($data['tags']);
            }
            if (isset($data['colors'])) {
                $colorIds = $data['colors'];
                unset($data['colors']);
            }

            if (!empty($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/public/images', $data['preview_image']);
            }

            $product = Product::firstOrCreate($data);
            if (isset($tagIds)) {
                $product->tags()->attach($tagIds);
            }
            if (isset($colorIds)) {
                $product->colors()->attach($colorIds);
            }
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

}
