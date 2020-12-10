<?php
namespace Rigo\Controller;

use Rigo\Types\Product;
use \WP_REST_Request;

class ProductController{  
    
    public function getSingleProduct(WP_REST_Request $request){
        $id = (string) $request['id'];
            $product = Product::get($id);
        $product = array(
               "ID" => $product->ID,
                "name" => $product->name,
                "price" => $product->price,
                "picture" => $product->picture,
                "short_description" => $product->short_description,
                "long_description" => $product->long_description,                
                "season" => $product->season                
            );
        return $product;
    }

    public function createProduct(WP_REST_Request $request){

        $body = json_decode($request->get_body());
        //returns a user id
        $id = Product::create([
            'post_title' => $body->post_title
            ]);
        //update custom fields    
        update_field('name', $body->name, $id);
        update_field('price', $body->price, $id);
        update_field('picture', $body->picture, $id);
        update_field('short_description', $body->short_description, $id);
        update_field('long_description', $body->long_description, $id);
        update_field('season', $body->season, $id);
        return $id;
    }

    
    public function deleteProduct(WP_REST_Request $request){
        $id = (string) $request['id'];
        // result is true on success, false on failure
        $result = Product::delete($id);
        return $result;
    }
        
        
    /**
     * Using Custom Post types to add new properties to the course
     */
    public function getProductWithCustomFields(WP_REST_Request $request){
        
        $users = [];
        $query = Product::all();
        foreach($query->posts as $product){
            $products[] = array(
                "ID" => $product->ID,
                "name" => $product->name,
                "price" => $product->price,
                "picture" => $product->picture,
                "short_description" => $product->short_description,
                "long_description" => $product->long_description,                
                "season" => $product->season                
            );
        $data = Array(
            "products" => $products
        );
        }   
        return $data;
    }
}
?>