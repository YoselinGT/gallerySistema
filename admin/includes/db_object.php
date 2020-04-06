<?php

class Db_object{


    static function find_all(){
        return static::find_by_query("SELECT * FROM " .static::$db_table. "");
    }

    static function find_by_id($id){

        $the_result_array = static::find_by_query("SELECT * FROM " .static::$db_table. " WHERE id = $id LIMIT 1");
        
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    static function find_by_query($sql){

        global $database;

        $result_set = $database->query($sql);

        // var_dump()
        $the_object_array = array();
        while($row = mysqli_fetch_array($result_set)){
            $the_object_array[]=static::instantation($row);
        }
        return $the_object_array;

    }

    public static function instantation($the_record){

        $calling_class = get_called_class();
        $the_objet = new $calling_class;
       
        foreach ($the_record as $the_attribute => $value){
            
            if($the_objet->has_the_attribute($the_attribute)){

                $the_objet->$the_attribute = $value;
                
                
            }
        }
        return $the_objet;
    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $database;

        $properties = $this->clean_properties();
        
        
        $sql = "INSERT INTO " .static::$db_table. "(". implode(",",array_keys($properties)) .")";
        $sql .= "VALUES ('". implode("','",array_values($properties)) ."')";
        
        if($database->query($sql)){
            $this->id = $database->the_insert_id();
             return true;
        }else{
            return false;
        }
    }

    public function update(){
        global $database;

        $properties = $this->clean_properties();

        $properties_pairs = array();

        foreach($properties as $key => $value){
            $properties_pairs[]= "{$key}='{$value}'";
           
        }
        
        $sql = "UPDATE " .static::$db_table. " SET ";
        $sql .= implode (", ",$properties_pairs);
        $sql .= " WHERE id=".$database->escape_string($this->id);
        
        

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ?true : false;

    }

    public function delete(){
        global $database;

        $sql = "DELETE FROM " .static::$db_table ." ";
        $sql .= "WHERE id=".$database->escape_string($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ?true : false;
    }

    protected function properties(){

        $properties = array();

        foreach(static::$db_table_fields as $bd_field){
           
            if(property_exists($this,$bd_field)){
                $properties[$bd_field]= $this->$bd_field;
            }
        }
        return $properties;
    }

    protected function clean_properties(){

        global $database;

        $clean_properties = array();

        foreach($this->properties() as $key => $value){
            $clean_properties[$key]=$database->escape_string($value);
        }

        return $clean_properties;

    }

    public function count_all(){

        global $database;

        $sql = "Select count(*) from ".static::$db_table;
        $result_set= $database->query($sql);
        $row = mysqli_fetch_array($result_set);

        return array_shift($row);
    }


}


?>