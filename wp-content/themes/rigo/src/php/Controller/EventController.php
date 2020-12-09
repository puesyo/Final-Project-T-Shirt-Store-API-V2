<?php
namespace Rigo\Controller;

use Rigo\Types\Event;
use \WP_REST_Request;

class EventController{
    
    // public function getHomeData(){
    //     return [
    //         'name' => 'Rigoberto'
    //     ];
    // }
    
    public function getSingleEvent(WP_REST_Request $request){
        $id = (string) $request['id'];
        $Event = Event::get($id);
        $fields = [
            "ID" => $Event->ID,
             "post_content" => $Event->post_content,
                "post_title" => $Event->post_title
            ]
        ;
        //this is fetching a Event with that id
        //return Event::get($id); 
        return $fields;
    }

    public function getAllEvents(WP_REST_Request $request){
        $Events = [];
        $result = Event::all(); //this is fetching a Event with that id
        print_r($result);
        foreach ($result->posts as $Event) {
            
            $Events[] = array(
                "ID" => $Event->ID,
                "Post_content" => $Event->Post_content,
                "title" => $Event->title
            );
        }
        //return $result->posts;
        return $Events;
    }

    public function createEvent(WP_REST_Request $request){
        // get the body json
        $body = json_decode($request->get_body());
        
        //print whatever you want
        //print_r($body);

        $id = Event::create([
            'post_title'    => $body->post_title
            // 'model' => $body->model,
            ]);
        //update_field('post_title', $body->make, $id);   
        update_field('post_content', $body->post_content, $id);
        return $id;
    }

     public function deleteEvent(WP_REST_Request $request){
        $id = (string) $request['id'];
        // result is true on success, false on failure
        $result = Event::delete($id);
        return $result;
    }
}