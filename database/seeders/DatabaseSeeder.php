<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

function humanize($string)
{
    $string = str_replace('-', ' ', $string);
    $string = ucwords($string);

    return $string;
}

function file_name($url)
{
    $info_path = pathinfo($url);

    return $info_path['basename'];
}


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $jsonData = json_decode(file_get_contents('database/seeders/products-spanish.json'), true);


        foreach ($jsonData['products'] as $productoData) {

            $category = DB::table('categories')->where('slug', $productoData['category'])->first();

            if (!$category) {
                $categoryId = DB::table('categories')->insertGetId([
                    'slug' => $productoData['category'],
                    'name' => humanize($productoData['category']),
                ]);
            } else {
                $categoryId = DB::table('categories')->where('slug', $productoData['category'])->value('id');
            }

            if (isset($productoData['brand'])) {
                $brand = DB::table('brands')->where('name', $productoData['brand'])->first();

                if (!$brand) {
                    $brandId = DB::table('brands')->insertGetId([
                        'name' => $productoData['brand'],
                    ]);
                } else {
                    $brandId = DB::table('brands')->where('name', $productoData['brand'])->value('id');
                }
            } else {
                $brandId = null;
            }


            DB::table('products')->insert(
                [
                    'title' => ucwords($productoData['title']),
                    'description' => $productoData['description'],
                    'price' => $productoData['price'],
                    'category_id' => $categoryId,
                    'brand_id' => $brandId
                ]
            );

            foreach ($productoData['reviews'] as $review) {
                $user = DB::table('users')->where('email', $review['reviewerEmail'])->first();

                if (!$user) {
                    $userId = DB::table('users')->insertGetId([
                        'name' => $review['reviewerName'],
                        'email' => $review['reviewerEmail'],
                    ]);
                } else {
                    $userId = DB::table('users')->where('email', $review['reviewerEmail'])->value('id');
                }

                DB::table('reviews')->insert(
                    [
                        'user_id' => $userId,
                        'product_id' => $productoData['id'],
                        'rating' => $review['rating'],
                        'comment' => $review['comment']
                    ]
                );
            }

            foreach ($productoData['images'] as $image) {
                $fileName = str_replace(['https://cdn.dummyjson.com/products/images', '%20', ' '], '', $image);

                DB::table('images')->insert(
                    [
                        'url' => "resources/images/products{$fileName}",
                        'is_thumbnail' => false,
                        'product_id' => $productoData['id'],
                    ]
                );
            }

            $tempTitle = str_replace(' ', '', $productoData['title']);
            if (isset($productoData['thumbnail'])) {
                $fileName = str_replace(['https://cdn.dummyjson.com/products/images', '%20', ' '], '', $image);

                DB::table('images')->insert(
                    [
                        'url' => "resources/images/products{$fileName}",
                        'is_thumbnail' => true,
                        'product_id' => $productoData['id'],
                    ]
                );
            }
        }
    }
}
