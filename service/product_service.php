<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * with PHP Data Objects (PDO)
 */
class DB
{

    // private $dbHost     = "127.0.0.1";
    private $dbHost     = "34.124.170.111";
    // private $dbUsername = "root";
    private $dbUsername = "admin";
    private $dbPassword = "yourpassword";
    private $dbName     = "ecommerce_web_year4";
    private $db;

    public function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            try {
                $conn = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            } catch (PDOException $e) {
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table, $conditions = array())
    {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $conditions) ? $conditions['select'] : '*';
        $sql .= ' FROM ' . $table;
        if (array_key_exists("where", $conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($conditions['where'] as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $sql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }

        if (array_key_exists("order_by", $conditions)) {
            $sql .= ' ORDER BY ' . $conditions['order_by'];
        }

        if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
        } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['limit'];
        }

        $query = $this->db->prepare($sql);
        $query->execute();

        if (array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all') {
            switch ($conditions['return_type']) {
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        } else {
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll();
            }
        }
        return !empty($data) ? $data : false;
    }

    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            // Build the column and value strings
            $columnString = implode(',', array_keys($data));
            $valueString = ":" . implode(',:', array_keys($data));

            // Prepare the SQL query
            $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
            $query = $this->db->prepare($sql);

            // Bind the values
            foreach ($data as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }

            // Execute the query and handle errors
            try {
                $insert = $query->execute();
                if ($insert) {
                    return $this->db->lastInsertId();
                } else {
                    // If execution fails, get the error details
                    $errorInfo = $query->errorInfo();
                    throw new Exception("Error executing query: " . $errorInfo[2]);
                }
            } catch (Exception $e) {
                // Log or print the error message for debugging
                echo "An error occurred: " . $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }


    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table, $data, $conditions)
    {
        if (!empty($data) && is_array($data)) {
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            // if (!array_key_exists('modified', $data)) {
            //     $data['modified'] = date("Y-m-d H:i:s");
            // }
            foreach ($data as $key => $val) {
                $pre = ($i > 0) ? ', ' : '';
                $colvalSet .= $pre . $key . "='" . $val . "'";
                $i++;
            }
            if (!empty($conditions) && is_array($conditions)) {
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach ($conditions as $key => $value) {
                    $pre = ($i > 0) ? ' AND ' : '';
                    $whereSql .= $pre . $key . " = '" . $value . "'";
                    $i++;
                }
            }
            $sql = "UPDATE " . $table . " SET " . $colvalSet . $whereSql;
            $query = $this->db->prepare($sql);
            $update = $query->execute();
            return $update ? $query->rowCount() : false;
        } else {
            return false;
        }
    }

    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */
    public function delete($query, $params = [])
    {
        try {
            // Prepare the SQL query
            $stmt = $this->db->prepare($query);

            // Bind the parameters
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            // Execute the query
            $stmt->execute();

            // Return true if the deletion was successful
            return true;
        } catch (PDOException $e) {
            // Log or print the error message for debugging
            echo "An error occurred: " . $e->getMessage();
            return false;
        }
    }

    public function getRow($table, $condition)
    {
        try {
            $query = "SELECT * FROM " . $table . " WHERE email = :email"; // Use parameterized query

            // Prepare the SQL statement
            $stmt = $this->db->prepare($query);

            // Bind the email parameter to the query
            $stmt->bindParam(':email', $condition['email']);

            // Execute the query
            $stmt->execute();

            // Fetch a single row as an associative array
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return the result (row) or null if not found
            return $row ? $row : null;
        } catch (PDOException $e) {
            die("Error fetching row: " . $e->getMessage());
        }
    }
}
