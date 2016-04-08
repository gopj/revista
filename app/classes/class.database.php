<?php
$database = new db();

$query = $database->select(‘user’);

$st = $database->result($query);

print_r($st);

public class db {
    public $server = 'localhost';
    public $user = 'root';
                public $passwd = '';
                public $db_name = 'revista';
                public $dbCon;

        public function __construct(){
                $this->dbCon = mysqli_connect($this->server, $this->user, $this->passwd, $this->db_name);
        }

        public function __destruct(){
                mysqli_close($this->dbCon);
        }

    /* insert function table name, array value
       $values = array(‘first_name’ => ‘pramod’,’last_name’=> ‘jain’);
    */            
       public function insert($table,$values)
       {
            $sql = “INSERT INTO $table SET “;
               $c=0;
            if(!empty($values)){
                foreach($values as $key=>$val){
                    if($c==0){
                        $sql .= “$key='”.htmlentities($val, ENT_QUOTES).”‘”;
                    }else{
                        $sql .= “, $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                    }
                    $c++;
                }
            }else{
              return false;
            }
            $this->dbCon->query($sql) or die(mysqli_error());
            return mysqli_insert_id($this->dbCon);
     }

     /* update function table name, array value
        $values = array(‘first_name’ => ‘pramod’,’last_name’=> ‘jain’);
        $condition = array(‘id’ =>5,’first_name’ => ‘pramod!’);
     */        
     public function update($table,$values,$condition)
     {
        $sql=”update $table SET “;
        $c=0;
        if(!empty($values)){
            foreach($values as $key=>$val){
                if($c==0){
                    $sql .= “$key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }else{
                    $sql .= “, $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }
                $c++;
            }
        }
        $k=0;    
        if(!empty($condition)){
            foreach($condition as $key=>$val){
                if($k==0){
                    $sql .= ” WHERE $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }else{
                    $sql .= ” AND $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }
                $k++;
            }
        }else{
          return false;
        }
        $result = $this->dbCon->query($sql) or die(mysqli_error());
        return $result;
     }

     /* delete function table name, array value
        $where = array(‘id’ =>5,’first_name’ => ‘pramod’);
     */    
    public function delete($table,$where)
    {
        $sql = “DELETE FROM $table “;
        $k=0;    
        if(!empty($where)){
            foreach($where as $key=>$val){
                if($k==0){
                    $sql .= ” where $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }else{
                    $sql .= ” AND $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }
                $k++;
            }
        }else{
            return false;
        }
           $del = $result = $this->dbCon->query($sql) or die(mysqli_error());
            if($del){
               return true;
            }else{
               return false;
            }
        }


    /* select function
       $rows = array(‘id’,’first_name’,’last_name’);
       $where = array(‘id’ =>5,’first_name’ => ‘pramod!’);
       $order = array(‘id’ => ‘DESC’);
       $limit = array(20,10);
    */
    public function select($table, $rows = ‘*’, $where = null, $order = null, $limit = null)
    {
       if($rows != ‘*’){
         $rows = implode(“,”,$rows);
       }

        $sql = ‘SELECT ‘.$rows.’ FROM ‘.$table;
        if($where != null){
            $k=0;
            foreach($where as $key=>$val){
                if($k==0){
                    $sql .= ” where $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }else{
                    $sql .= ” AND $key='”.htmlentities($val, ENT_QUOTES).”‘”;
                }
                $k++;
            }    
        }

        if($order != null){
            foreach($order as $key=>$val){
                    $sql .= ” ORDER BY $key “.htmlentities($val, ENT_QUOTES).””;
            }    
        }    

      if($limit != null){
             $limit = implode(“,”,$limit);
             $sql .= ” LIMIT $limit”;

        }
        $result = $this->dbCon->query($sql);
        return $result;

    }  

    public function query($sql){
    $result = $this->dbCon->query($sql);
    return $result;
    }

    public function result($result){
    $row = $result->fetch_array();
    $result->close();
    return $row;
    }

    public function row($result){
    $row = $result->fetch_row();
    $result->close();
    return $row;
    }

    public function numrow($result){
    $row = $result->num_rows;
    $result->close();
    return $row;
    }

 }
?>