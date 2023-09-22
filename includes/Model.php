<?php
/**
 * Created by PhpStorm.
 * User: Halsey
 * Date: 20/05/2020
 * Time: 13:26
 */
include "Database.php";
class Model extends Database
{

    public function GetUserPassword($userid){
        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");

            $stmt->execute([$userid]);

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows[0]['password'];
    }

    public function GetOne($table, $id){
        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM $table WHERE id = ?");

            $stmt->execute([$id]);

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows[0];
    }

    public function ContentExists($tableName, $criteria, $value){
        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM $tableName WHERE $criteria = ?");

            $stmt->execute([$value]);

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows;
    }

    public function Insert($table, $data){
        $columns = []; $values =[]; $insertTokens = [];
        foreach($data as $key=>$value) {
            array_push($columns, $key);
            array_push($insertTokens, "?");
            array_push($values, $value);
        }
        $sql_cols = implode(",", $columns);
        $sql_values = implode(",", $insertTokens);
    
        try {
            $conn = new PDO("mysql:host=".$this->ServerName().";dbname=".$this->DatabaseName(), $this->UserName(), $this->Password());
    
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "INSERT INTO " .$table."(". $sql_cols .") VALUES (" . $sql_values . ")";
    
            // use exec() because no results are returned
            $statement = $conn->prepare($sql);
            $statement->execute($values);
    
            $conn = null;
    
            return "Successful";
    
        }
        catch(PDOException $e)
        {
            $conn = null;
            return $e->getMessage();
        }
        
    }

    public function Update($table, $data, $criteria){
        $columns = []; $values =[]; $crit =[];
        foreach($data as $key=>$value) {
            array_push($columns, $key.'=?');
            array_push($values, $value);
        }

        foreach($criteria as $key=>$value) {
            array_push($crit, $key."='".$value."'");
        }

        $sql_cols = implode(",", $columns);
        $sql_criteria = implode(' AND ', $crit);
        try {
            $conn = new PDO("mysql:host=".$this->ServerName().";dbname=".$this->DatabaseName(), $this->UserName(), $this->Password());
    
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "UPDATE $table SET ".$sql_cols." WHERE ".$sql_criteria;
    
            // use exec() because no results are returned
            $statement = $conn->prepare($sql);
            $statement->execute($values);
    
            $conn = null;
    
            return "Successful";
    
        }
        catch(PDOException $e)
        {
            $conn = null;
            return $e->getMessage();
        }
    }

    public function Get($table){
        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM $table");

            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows;
    }

    public function GetAllWithCriteria($table, $criteria){
        $crit =[];
        foreach($criteria as $key=>$value) {
            array_push($crit, $key."='".$value."'");
        }
        $sql_criteria = implode(' AND ', $crit);
        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM $table WHERE ".$sql_criteria);

            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows;
    }

    public function GetSomeWithCriteria($table, $kolumns, $criteria){
        $columns = []; $crit =[];
        foreach($kolumns as $value) {
            array_push($columns, $value);
        }
        foreach($criteria as $key=>$value) {
            array_push($crit, $key."='".$value."'");
        }
        $sql_cols = implode(",", $columns);
        $sql_criteria = implode(' AND ', $crit);      
        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT $sql_cols FROM $table WHERE $sql_criteria");
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;
        return $rows;
    }

    public function SearchWithCriteria($table, $criteria, $range){
        $crit =[];
        foreach($criteria as $key=>$value) {
            array_push($crit, $key."='".$value."'");
        }
        $sql_criteria = implode(' AND ', $crit);

        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM $table WHERE ".$sql_criteria." AND ".$range);

            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows;
    }

    public function GetOrderedWithCriteria($table, $criteria, $orderby, $sort){
        if ($sort != 'ASC' && $sort != 'DESC'){
            $sort = 'ASC';
        }

        $crit =[]; 
        $order =[];
        foreach($criteria as $key=>$value) {
            array_push($crit, $key."='".$value."'");
        }
        $sql_criteria = implode(' AND ', $crit);

        foreach($orderby as $value) {
            array_push($order, $value);
        }
        $options = implode(', ', $order);

        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM $table WHERE ".$sql_criteria." ORDER BY ".$options." ".$sort);

            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows;
    }

    public function InsertFiles($table, $fileArray, $id, $type){
        if ($type == 'int') {
            if (count($fileArray) == 1){
                $sql = "INSERT INTO " . $table . " (prop_id, exterior, interior1, interior2, interior3, dateof )" . " VALUES ($id,'','$fileArray[0]','','',NOW())";
            }elseif (count($fileArray) == 2){
                $sql = "INSERT INTO " . $table . " (prop_id, exterior, interior1, interior2, interior3, dateof )" . " VALUES ($id,'','$fileArray[0]','$fileArray[1]','',NOW())";
            }elseif(count($fileArray) == 3){
                $sql = "INSERT INTO " . $table . " (prop_id, exterior, interior1, interior2, interior3, dateof )" . " VALUES ($id,'','$fileArray[0]','$fileArray[1]','$fileArray[2]',NOW())";
            }elseif(count($fileArray) > 3){
                $sql = "INSERT INTO " . $table . " (prop_id, exterior, interior1, interior2, interior3, dateof )" . " VALUES ($id,'','$fileArray[0]','$fileArray[1]','$fileArray[2]',NOW())";
            }
        }elseif ($type == 'ext'){
            $sql = "INSERT INTO " . $table . " (prop_id, exterior, interior1, interior2, interior3, dateof )" . " VALUES ($id,'$fileArray[0]','','','',NOW())";
        }else{
            $sql = "";
        }

        try {
            $conn = new PDO("mysql:host=".$this->ServerName().";dbname=".$this->DatabaseName(), $this->UserName(), $this->Password());
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            // use exec() because no results are returned
            $statement = $conn->prepare($sql);
            $statement->execute();
            $conn = null;
            return true;
        }
        catch(PDOException $e)
        {
            $conn = null;
            return $e->getMessage();
        }
    }

    public function UpdateFiles($table, $fileArray, $id, $type){
        if ($type == 'int') {
            if (count($fileArray) == 1){
                $sql = "UPDATE " . $table . " SET interior1 = '$fileArray[0]' WHERE prop_id = '$id'";
            }elseif (count($fileArray) == 2){
                $sql = "UPDATE " . $table . " SET interior1 = '$fileArray[0]', interior2 = '$fileArray[1]' WHERE prop_id = '$id'";
            }elseif(count($fileArray) == 3){
                $sql = "UPDATE " . $table . " SET interior1 = '$fileArray[0]', interior2 = '$fileArray[1]', interior3 = '$fileArray[2]' WHERE prop_id = '$id'";
            }elseif(count($fileArray) > 3){
                $sql = "UPDATE " . $table . " SET interior1 = '$fileArray[0]', interior2 = '$fileArray[1]', interior3 = '$fileArray[2]' WHERE prop_id = '$id'";
            }
        }elseif ($type == 'ext'){
            $sql = "UPDATE " . $table . " SET exterior = '$fileArray[0]' WHERE prop_id = '$id'";
        }else{
            $sql = "";
        }

        try {
            $conn = new PDO("mysql:host=".$this->ServerName().";dbname=".$this->DatabaseName(), $this->UserName(), $this->Password());
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            // use exec() because no results are returned
            $statement = $conn->prepare($sql);
            $statement->execute();
            $conn = null;
            return true;
        }
        catch(PDOException $e)
        {
            $conn = null;
            return $e->getMessage();
        }
    }

    public function GetDistinct($table, $column, array $criteria = null){
        if(!empty($criteria) && $criteria != null){
            $crit =[]; 
            foreach($criteria as $key=>$value) {
                array_push($crit, $key."='".$value."'");
            }
            $sql_criteria = implode(' AND ', $crit);
            $sql = "SELECT DISTINCT $column FROM $table WHERE ".$sql_criteria." ORDER BY $column ASC";
        }else{
            $sql = "SELECT DISTINCT $column FROM $table ORDER BY $column ASC";
        }

        $rows = array();
        try {
            $conn = new PDO("mysql:host=" . $this->ServerName() . ";dbname=" . $this->DatabaseName(), $this->UserName(), $this->Password());

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($sql);

            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $stmt->fetchAll();

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        $conn = null;

        return $rows;
    }
}