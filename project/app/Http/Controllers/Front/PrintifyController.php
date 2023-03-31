<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Subcategory;
use App\Traits\Printify;

class PrintifyController extends FrontBaseController
{
    use Printify;

    /**
     * Get all products from printify
     * @return string
     */
    public function getAllProducts()
    {
        try {
            $printifyProducts = $this->fetchPrintifyProducts();
            $this->addPrintifyProductToDatabase($printifyProducts);


            return back()->with('success', 'Printify Products Updated Successfully');

        } catch (\Exception $exception){
            return back()->with('unsuccess', $exception->getMessage());
        }

//        return view('frontend.printify', compact('printifyProducts'));
    }

    /**
     * Get single product details from printify
     * @param $printifyProductId
     */
    public function productDetails($printifyProductId)
    {
        $product = $this->getPrintifyProductDetail($printifyProductId);
        $product = json_decode($product);
//        dd($product);
        return view('frontend.printify-product-detail', compact('product'));
    }

    public function addPrintifyProductToDatabase($printifyProducts)
    {
        foreach (json_decode($printifyProducts)->data as $product) {
            $all_sizes = [];
            $all_colors = [];
            $size = [];
            $color = [];
            $size_qty = [];
            $size_price = [];
            $variant_ids = [];

            // Product Options
            foreach ($product->options as $option) {
                // Product Sizes
                if ($option->type == 'size') {
                    foreach ($option->values as $value) {
                        $all_sizes[$value->id] = $value->title;
                    }
                }

                // Product Colors
                if ($option->type == 'color') {
                    foreach ($option->values as $value) {
                        $all_colors[$value->id] = $value->colors[0];
                    }
                }
            }

            foreach ($product->variants as $variant) {
                array_push($variant_ids, $variant->id);
                foreach ($variant->options as $key => $option) {
                    if (array_key_exists($option, $all_sizes)) {
                        array_push($size, $all_sizes[$option]);
                    } else if (array_key_exists($option, $all_colors)) {
                        array_push($color, $all_colors[$option]);
                    }
                }

                array_push($size_qty, $variant->is_available ? 100 : 0);
                array_push($size_price, $variant->price / 100);
            }


            $size = implode(',', $size);
            $color = implode(',', $color);
            $size_qty = implode(',', $size_qty);
            $size_price = implode(',', $size_price);
            $variant_ids = implode(',', $variant_ids);

            $new_product = Product::where('printify_product_id', $product->id)->first();

            if (empty($new_product)){
                $new_product = new Product();
            }

            $printify_category = Category::where('name', 'Printify')->first();


            $category_id = null;
            $subcategory_id = null;

            $home_category = Category::where('name', 'Home decoration')->first() ?? null;
            $accessories_category = Subcategory::where('name', 'Accessories')->first() ?? null;
            $clothing_category = Subcategory::where('name', 'CLOTHINGS')->first() ?? null;

            if ($product->tags[0] == 'Home & Living') {
                $category_id = $home_category->id;
                $subcategory_id = null;
            }
            elseif ($product->tags[0] == "Accessories") {
                $category_id = $accessories_category->category_id;
                $subcategory_id = $accessories_category->id;
            }
            elseif ($product->tags[0] == "Men's Clothing") {
                $category_id = $clothing_category->category_id;
                $subcategory_id = $clothing_category->id;
            }
            elseif ($product->tags[0] == "T-shirts") {
                $category_id = $clothing_category->category_id;
                $subcategory_id = $clothing_category->id;
            }

            $new_product->product_type = 'normal';
            $new_product->user_id = 0;
//            $new_product->category_id = $printify_category->id;
            $new_product->category_id = $category_id;
            $new_product->subcategory_id = $subcategory_id;
            $new_product->name = $product->title;
            $new_product->slug = trim(str_replace(' ', '-', $product->title));
            $new_product->photo = $product->images[0]->src;
            $new_product->size = $size;
            $new_product->size_qty = $size_qty;
            $new_product->size_price = $size_price;
            $new_product->color = $color;
            $new_product->printify_variant_id = $variant_ids;
            $new_product->price = 0;
            $new_product->details = $product->description;
            $new_product->status = $product->visible ? 1 : 0;
            $new_product->views = 0;
            $new_product->tags = implode(',', $product->tags);
            $new_product->product_condition = 0;
            $new_product->is_meta = 0;
            $new_product->type = 'Physical';
            $new_product->featured = 0;
            $new_product->best = 0;
            $new_product->top = 0;
            $new_product->hot = 0;
            $new_product->latest = 0;
            $new_product->big = 0;
            $new_product->trending = 0;
            $new_product->sale = 0;
            $new_product->is_discount = 0;
            $new_product->is_catalog = 0;
            $new_product->catalog_id = 0;
            $new_product->language_id = 1;
            $new_product->preordered = 0;
            $new_product->color_all = implode(',', $all_colors);
            $new_product->size_all = implode(',', $all_sizes);
            $new_product->stock_check = 1;
            $new_product->is_printify = '1';
            $new_product->printify_product_id = $product->id;
            $new_product->printify_product_update_date = $product->updated_at;
            $new_product->save();


            // product gallery
            // delete old pictures
            $deleteGallery = Gallery::where('product_id', $new_product->id)->delete();

            for ($i = 1; $i < count($product->images); $i++){
                $gallery = new Gallery();
                $gallery->product_id = $new_product->id;
                $gallery->photo = $product->images[$i]->src;
                $gallery->save();
            }

        }
    }
}
