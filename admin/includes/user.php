<?php

class User{

    public $id;
    public $username;
    public $password;
    public $firs_name;
    public $last_name;

    static function find_all_users(){

        global $database;

        $result_set = $database->query("SELECT * FROM users");

        return $result_set;

    }
    static function find_user_by_id($user_id){

        global $database;

        $result_set = $database->query("SELECT * FROM users WHERE id = $user_id LIMIT 1");

        $found_user = mysqli_fetch_array($result_set);

        return $found_user;

    }
    static function find_this_query($sql){

        global $database;

        $result_set = $database->query($sql);

        return $result_set;

    }

    public static function instantation($the_record){
        $the_objet = new self;
        print_r($the_record);
        die();
        // $the_objet->id = $found_user['id'];
        // $the_objet->username = $found_user['username'];
        // $the_objet->password = $found_user['password'];
        // $the_objet->firs_name = $found_user['firs_name'];
        // $the_objet->last_name = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value){
            if($the_objet->has_the_attribute($the_attribute)){
                $the_object->the_attribute = $value;
            }
        }
        
        return $the_objet;
    }

    private function has_the_attribute($the_attribute){
        
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);

    }
}


?>