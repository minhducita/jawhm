<?php
/**
 * Auth: SINHNGUYEN
 * Email: sinhnguyen193@gmail.com
 */
class Category
{
    public $id;
    public $name;
    public $ascii_name;

    /**
     * @param array $params
     */
    public function insert(array $params)
    {
        global $db;
        $params['ascii_name'] = StrRewrite($params['name']);
        $stmt = $db->prepare('INSERT INTO `category` (`name`, `ascii_name`) VALUES (?, ?)');
        $stmt->bindParam(1, $params['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $params['ascii_name'], PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            return $db->lastInsertId();
        }
        return $result;
    }

    /**
     * @param string $condition
     * @param array $params
     * @return array
     */
    public function find($condition = '', $params = array())
    {
        global $db;
        $category = array();
        $sql = 'SELECT * FROM `category` WHERE 1';
        if (is_array($condition)) {
            $sql .= ' '.implode(' ', $condition);
        } else if ($condition) {
            $sql .= ' AND '.$condition;
        }
        $stmt = $db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $k => &$value) {
                $stmt->bindParam($k, $value);
            }
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $category[] = $row;
            }
        }
        return $category;
    }
    /**
     * @param string $attributes of table
     * @param $values
     * @return bool|DbRowSet|mysqli_result|number|PDOStatement
     */
    public function checkExits($attributes, $values)
    {
        global $db;
        $result = $db->query("SELECT EXISTS(SELECT 1 FROM `category` WHERE `$attributes` = '$values')");
        return $result->fetchColumn();
    }
}