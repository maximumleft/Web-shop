<?php

namespace App\Services;

use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store($data): void
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
    public function update($data,$product): void
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

            $product->update($data);
            if (isset($tagIds)) {
                $product->tags()->sync($tagIds);
            }
            if (isset($colorIds)) {
                $product->colors()->sync($colorIds);
            }
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function showTags($product): array
    {
        $tagsIds = ProductTag::query()
            ->where('product_id', $product->id)
            ->get();
        foreach ($tagsIds as $tagsId) {
            $tags[] = Tag::query()->where('id', $tagsId->tag_id)->first();
        }

        return $tags;
    }
    public function showColors($product): array
    {
        $colorsIds = ColorProduct::query()
            ->where('product_id', $product->id)
            ->get();
        foreach ($colorsIds as $colorsId) {
            $colors[] = Color::query()->where('id', $colorsId->color_id)->first();
        }

        return $colors;
    }

}
