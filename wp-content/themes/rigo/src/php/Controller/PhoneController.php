<?php
namespace Rigo\Controller;

use Rigo\Types\Phone;
use \WP_REST_Request;

class PhoneController{
    
    // public function getHomeData(){
    //     return [
    //         'name' => 'Rigoberto'
    //     ];
    // }
    
    public function getSinglePhone(WP_REST_Request $request){
        $id = (string) $request['id'];
        $phone = Phone::get($id);
        $fields = [
            "ID" => $phone->ID,
            "post_title" => $phone->post_title,
            "Model" => $phone->model
            ]
        ;
        //this is fetching a phone with that id
        //return Phone::get($id); 
        return $fields;
    }

    public function getAllPhones(WP_REST_Request $request){
        $phones = [];
        $result = Phone::all(); //this is fetching a phone with that id
        foreach ($result->posts as $phone) {
            $phones[] = array(
                "ID" => $phone->ID,
                "post_title" => $phone->post_title,
                "Model" => $phone->model
            );
        }

        //return $result->posts;
        return $phones;
    }

    public function createPhone(WP_REST_Request $request){
        // get the body json
        $body = json_decode($request->get_body());
        
        //print whatever you want
        //print_r($body);

        $id = Phone::create([
            'post_title'    => $body->make
            // 'model' => $body->model,
            ]);
        //update_field('post_title', $body->make, $id);   
        update_field('Model', $body->model, $id);
        return $id;
    }

     public function deletePhone(WP_REST_Request $request){
        $id = (string) $request['id'];
        // result is true on success, false on failure
        $result = Phone::delete($id);
        return $result;
    }
}