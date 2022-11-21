<?php

// abstract for creating model
class Model {
    private $name;
    private $conn;
    private $fields = Array();

    /**
     * ....................................
     * @model constructor
     * constructor take database connection
     * ....................................
     */
    function __construct($conn) {
        $this->conn = $conn;
    }

    /**
     * ...................................
     * @create model
     * ...................................
     */
    public function create($name, $fields) {
        /**
         * set model name
         */
        $this->name = $name;
        /**
         * construct model query
         */
        $sql = "CREATE TABLE IF NOT EXISTS " . $this->name ." (";
        $i = 0;
        $cnt = count($fields) - 1;
        foreach($fields as $key => $val) {
            $this->fields[$key] = $key;
            if($i === $cnt) {
                $sql .= $key . " ". $val . ")";
            } else {
                $i++;
                $sql .= $key ." ". $val . ",";
            }
        }
        /**
         * create model to the database
         */
        if (!mysqli_query($this->conn, $sql)) {
            echo "Table creation failed ".mysqli_error($this->conn);
        } 
    }

    /**
     * ...............................
     * @insert without prepared
     * ...............................
     */
    public function insert($object) {
        // prepared insert query
        $sql = "INSERT INTO ".$this->name . " ";
        $keys = "";
        $values = "";
        $i = 0;
        $cnt = count($object) - 1;
        foreach($object as $key => $val) {
            if($i === $cnt) {
                $keys .= $key;
                $values .= "'".$val."'";
            }  else {
                $i++;
                $keys .= $key . ", ";
                $values .= "'". $val . "', ";
            }
        }
        $sql .= "(".$keys.") VALUES ( ". $values . ")";
        /**
         * Insert data to database
         */
        if(!mysqli_query($this->conn, $sql)) {
            echo "Error:".$sql."<br>".mysqli_error($this->conn);
            return false;
        } else {
            return true;
        }
    }
    /**
     * ......................................
     * update model by id
     * Ex: updateById(1, ["key" => "val"])
     * .......................................
     */
    public function updateById($id, $object) {
        // prepare for update
        $sql = "UPDATE ".$this->name." SET ";
        $i=0;
        $cnt= count($object) - 1;
        foreach($object as $key => $val) {
            if($i === $cnt) {

                $sql .= $key . "='".$val."' ";
            } else {
                $i++;
                $sql .= $key . "='".$val."', ";

            }
        }
        $sql .= " WHERE id=".$id;
        // update database recored
        if(!mysqli_query($this->conn, $sql)) {
            echo "Error: ".$sql."<br>".mysqli_error($this->conn);
            return false;
        } else {
            return true;
        }
    }
    /**
     * ................................
     * delete model data by id
     * Ex: delete(["id", 1])
     * ................................
     */
    public function delete($field) {
        // delete query
        $sql = "DELETE FROM ".$this->name." WHERE ".$field[0]."=".$field[1];
        // perform action
        if(!mysqli_query($this->conn, $sql)) {
            echo "Error: ".$sql.mysqli_error($this->conn);
            return false;
        } else {
            return true;
        }
    }

    /**
     * ..............................
     * @get model data
     * Ex: select(["PersonID", "FirstName"])
     * Ex2: select()
     * ..............................
     */
     public function select($object = Array()) {
        $sql = "SELECT ";
        $cnt = count($object);
        if( $cnt > 0) {
            $i = 0;
            foreach($object as $o) {
                if($i === ($cnt - 1)) {
                    $sql .= $o;
                } else {
                    $i++;
                    $sql .= $o . ",";
                }
            }
            $sql .= " FROM ".$this->name;
        } else {
            $sql .= "* FROM ".$this->name;
        }
        $data = Array();
       // fetch data from database
       $res = mysqli_query($this->conn, $sql);
       if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
               array_push($data, $row);
            }
       }
       return $data;
     }

    // conditional select
    public function findAllByCondition($condition) {
       $sql = "SELECT ";
       $sql .= "* FROM ".$this->name;
       $sql .= " ".$condition;
       $data = Array();
       // fetch data from database
       $res = mysqli_query($this->conn, $sql);
       if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
               array_push($data, $row);
            }
       }
       return $data;
     }
    /**
     * .................................................................
     * find by field
     * .................................................................
     */
    function find($condition) {
        $sql ="SELECT * FROM ".$this->name;
        $sql .= " WHERE ".$condition;
        $data = Array();
        // fetch data
        $res = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)) {
               array_push($data, $row);
            }
       }
       return $data;
    }
    /**
    *...............................
    *  @return model name 
    *...............................
    */
    public function getName() {
        return $this->name;
    }
    /**
    *.............................
    * @return model fields
    *.............................
    */
    public function getFields() {
        return $this->fields;
    }
}
