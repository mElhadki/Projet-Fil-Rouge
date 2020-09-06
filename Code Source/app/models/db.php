<?php
define('BASE_URL', "http://localhost/mariashop");
function printIt($value)
{
    echo "<pre>", print_r($value), "</pre>";
}

session_start();
class CRUD extends DB
{
    public function selectOne($table, $condition)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        $i = 0;
        foreach ($condition as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";
        $stmt = $this->connect();
        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }

    public function selectAll($table, $condition = [])
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        if (empty($condition)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        } else {
            $i = 0;
            foreach ($condition as $key => $value) {
                if ($i === 0) {
                    $sql = $sql . " WHERE $key=?";
                } else {
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }
            $stmt = $conn->prepare($sql);
            $value = array_values($condition);
            $type = str_repeat('s', count($value));
            $stmt->bind_param($type, ...$value);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        }
    }

    public function create($table, $data)
    {
        $conn = $this->connect();
        $sql = "INSERT INTO $table SET ";

        $i = 0;

        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " $key = ?";
            } else {
                $sql = $sql . ", $key = ?";
            }
            $i++;
        }

        $stmt = $conn->prepare($sql);
        $value = array_values($data);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();

        $id = $stmt->insert_id;
        return $id;
    }
    public function executeQuery($sql, $data)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $value = array_values($data);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();
        return $stmt;
    }


    public function update($table, $id, $data, $idName)
    {
        $conn = $this->connect();
        $sql = "UPDATE $table SET ";

        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql . " WHERE $table . $idName=?";
        $data['$idName'] = $id;
        $stmt = $this->executeQuery($sql, $data);
        return $stmt->affected_rows;
    }


    public function delete($table, $idName, $id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM $table WHERE $idName=?";
        $stmt = $this->executeQuery($sql, ['$idName' => $id]);
        return $stmt->affected_rows;
    }
   
}

class Paginator extends DB
{
    public function showingItems($table, $conditionName, $condition, $start, $perPage)
    {
        $conn = $this->connect();
        $select_data = "SELECT * from $table WHERE $conditionName = $condition LIMIT $start, $perPage";
        $query = mysqli_query($conn, $select_data);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    public function buttonPagination($table, $conditionName, $condition)
    {
        $conn = $this->connect();
        $select_all = "SELECT * from $table WHERE $conditionName = $condition";
        $query_all = mysqli_query($conn, $select_all);
        $row = mysqli_num_rows($query_all);
        return $row;
    }


    public function showingAllItems($table, $start, $perPage)
    {
        $conn = $this->connect();
        $select_data = "SELECT * from $table LIMIT $start, $perPage";
        $query = mysqli_query($conn, $select_data);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
    }

    public function AllButtonPagination($table)
    {
        $conn = $this->connect();
        $select_all = "SELECT * from $table";
        $query_all = mysqli_query($conn, $select_all);
        $row = mysqli_num_rows($query_all);
        return $row;
    }
}

class Order extends DB{
    public function getOrderId($table, $condition, $idOrder){
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        $sql = $sql . " ORDER BY $idOrder DESC";
        $sql = $sql . " LIMIT 1";
        $stmt = $this->connect();
        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }

    public function getDiffNumOrder($table, $order)
    {
        $conn = $this->connect();
       $sql = "SELECT * FROM `$table` GROUP BY $order HAVING COUNT($order) > 1";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;

    
    }

    public function getDiffNumOrderForUser($table, $order, $idU)
    {
        $conn = $this->connect();
       $sql = "SELECT * FROM `$table` WHERE idU = $idU GROUP BY $order HAVING COUNT($order) > 1";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;

    
    }
    public function getOneProductQte($table, $order){
        $conn = $this->connect();
        $sql = "SELECT * FROM `$table` GROUP BY $order HAVING COUNT($order) = 1";
         $query = mysqli_query($conn, $sql);
         $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
         return $result;
    }
    public function getOneProductQteForUser($table, $order, $idU){
        $conn = $this->connect();
        $sql = "SELECT * FROM `$table` WHERE idU = $idU GROUP BY $order HAVING COUNT($order) = 1";
         $query = mysqli_query($conn, $sql);
         $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
         return $result;
    }
    public function updateCalculated($idOrder){
        $conn = $this->connect();
        $sql = "UPDATE `orders` SET `calculated` = '1' WHERE `orders`.`idOrder` = $idOrder";
        $query = mysqli_query($conn, $sql);
        return $query;
    }
}
class Search extends DB{
   

    public function searchProduct($term){
        $match = '%' . $term . '%';
        $conn = $this->connect();
        $sql = "SELECT p.* FROM product AS p WHERE p.nameProduct LIKE '$match'";
        $query = mysqli_query($conn, $sql);
        $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $records;
    }
    
}