<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Modules\Product\Entities{
/**
 * Modules\Product\Entities\Product
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $brand_id
 * @property string $title
 * @property string $slug
 * @property int $sku
 * @property string $image
 * @property int $price
 * @property int|null $sale_price
 * @property int|null $handling_time
 * @property int|null $shipping_cost
 * @property int $total_orders
 * @property int $total_favourites
 * @property int $status
 * @property string|null $short_description
 * @property string|null $long_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Attribute\Entities\AttributeValue[] $attributes
 * @property-read int|null $attributes_count
 * @property-read \Modules\Brand\Entities\Brand|null $brand
 * @property-read \Modules\Category\Entities\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Product\Entities\ProductGallery[] $galleries
 * @property-read int|null $galleries_count
 * @property-write mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 */
	class Product extends \Eloquent {}
}

