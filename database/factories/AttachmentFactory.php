<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $product = 1;
    public function definition(): array
    {
        $filepath = 'public/templates/assets/images/product/P'. rand(1, 8) . '.jpg';
        $newFile = time() . "P" . rand(65, 999) .  rand(1000,2000) . rand(1, 8).".jpg";
        $destination = "public/uploads/product/${newFile}";

        if( !copy($filepath, $destination) ) {  
            echo "File can't be copied! \n";  
        }   
        return [
            'name' => $newFile,
            'product_id' => self::$product++,
        ];
    }
}
