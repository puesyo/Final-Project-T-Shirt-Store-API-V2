<?php
namespace Rigo\Controller;

// use Rigo\Types\Course;
use Rigo\Types\UserLogIn;
use \WP_REST_Request;

class UserLogInController{
    
    
    //This function requests a single user
    public function getSingleUser(WP_REST_Request $request){
        $id = (string) $request['id'];
        $user = UserLogIn::get($id);
        $user = array(
                "ID" => $user->ID,
                // "title" => $user->title,
                "name" => $user->name,
                "last_name" => $user->last_name,
                "email" => $user->email,
                "password" => $user->password,
                
            );
        return $user;
    }
    
    //This function requests all users with all the default fields
    public function getAllUsers(WP_REST_Request $request){
        
        
        $query = UserLogIn::all();
        return $query;//Always return an Array type
    }
    
    // public function getCoursesByType(WP_REST_Request $request){
        
    //     $query = UserLogIn::all([ 'status' => 'draft' ]);
    //     return $query->posts;
    // }
    
    public function createUser(WP_REST_Request $request){

        $body = json_decode($request->get_body());
        //returns a user id
        $id = UserLogIn::create([
            'post_title' => $body->post_title
            ]);
        //update custom fields    
        update_field('name', $body->name, $id);
        update_field('last_name', $body->last_name, $id);
        update_field('email', $body->email, $id);
        update_field('password', $body->password, $id);
        return $id;
        //var_dump($body);
        //return json_encode("true");
    }

    
    public function deleteUser(WP_REST_Request $request){
        $id = (string) $request['id'];
        // result is true on success, false on failure
        $result = UserLogIn::delete($id);
        return $result;
    }
        
        
    /**
     * Using Custom Post types to add new properties to the course
     */
    public function getUserWithCustomFields(WP_REST_Request $request){
        
        $users = [];
        //$data = "";
        $query = UserLogIn::all();
        foreach($query->posts as $user){
            $users[] = array(
                "ID" => $user->ID,
                // "title" => $user->title,
                "name" => $user->name,
                "last_name" => $user->last_name,
                "email" => $user->email,
                "password" => $user->password,
                
            );
        $data = Array(
            "users" => $users
        );
        }
        return $data;
    }
}
?>