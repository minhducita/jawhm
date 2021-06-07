<?php
/**
 * Auth: SINHNGUYEN
 * Email: sinhnguyen193@gmail.com
 */
class FeedBack
{
    const FEED_SHOW = 1;
    const FEED_HIDE = 0;
    public $id;
    public $category;
    public $onShow;
    public $comment;
    public $createdDate;
    public $updatedDate;
    public $default_attributes = array(
           'onShow'      => self::FEED_SHOW
    );

    /**
     * @param array $params
     * @return bool|int|mixed|null|string
     */
    public function insert(array $params)
    {
        global $db;
        $params = array_merge($this->default_attributes, $params);
        $stmt = $db->prepare('INSERT INTO `feedback` (`category_name`, `onShow`, `comment`, `createdDate`, `updatedDate`, `userid`) VALUES (?, ?, ?, NOW(), NOW(),"'.$_SESSION['user_id'].'")');
        $stmt->bindParam(1, $params['category_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $params['onShow'], PDO::PARAM_INT);
        $stmt->bindParam(3, $params['comment'], PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            return $db->lastInsertId();
        }
        return $result;
    }

    /**
     * @param array $params
     * @return bool
     */
    public function update(array $params)
    {
        global $db;
        $params = array_merge($this->default_attributes, $params);
        //update category
        if($params['category_name'] != $params['old_category_name']){
            $sql = "UPDATE feedback SET category_name = ? WHERE category_name = ?";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(1, $params['category_name'], PDO::PARAM_STR);
            $stmt->bindParam(2, $params['old_category_name'], PDO::PARAM_STR);
            $stmt->execute();
        }

        //update new data
        $stmt = $db->prepare('UPDATE `feedback` SET `category_name` = ?, `onShow` = ?, `comment` = ?, `updatedDate` = NOW() WHERE `id` = ?');
        $stmt->bindParam(1, $params['category_name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $params['onShow'], PDO::PARAM_INT);
        $stmt->bindParam(3, $params['comment'], PDO::PARAM_STR);
        $stmt->bindParam(4, $params['id'], PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }

    public function all()
    {
        global $db;

        $feedback = array();

        $sql = "SELECT * FROM feedback ORDER BY createdDate DESC ";
        $stmt = $db->prepare($sql);


        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $feedback[] = $row;
            }
        }
        return $feedback;
    }

    /**
     * @param string $condition
     * @param array $params
     * @return array
     */
    public function find($condition = '', $params = array())
    {
        global $db;
        $feedback = array();
        $sql = 'SELECT * FROM `feedback` WHERE 1';

        if (is_array($condition)) {
            $sql .= ' '.implode(' ', $condition);
            $sql.= ' ORDER BY `createdDate` DESC';
        } else if ($condition) {
            if (preg_match('/^(?:ORDER BY)/i', $condition)) {
                $sql .= ' '.$condition;
            } else {
                $sql .= ' AND '.$condition;
            }
        } else {
            $sql.= ' ORDER BY `createdDate` DESC';
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
                $feedback[] = $row;
            }
        }
        return $feedback;

    }

    /**
     * @param $params
     * @return array
     */
    public function search($params)
    {
        if (!empty($params)) {
            $condition  = $this->addFilter($params);
            $condition  =  array_merge($condition,
                        $this->addFilter(array('comment' =>
                            (is_string($params['comment']) ? ($params['comment'] !== '' ? '%'.$params['comment'].'%' : $params['comment']) : ($comment = array_map(function($value){return '%'.$value.'%';}, $params['comment']))
                        )), 'LIKE')
            );
            return $this->find($condition);
        }
        return array();
    }

    /**
     * @param array $params
     * @param string $type
     * @param string $secpator
     * @return array
     */
    public function addFilter($params = array(),$type = '=', $secpator = 'AND')
    {
        $conditions   = array();
        if (!is_array($params)) {
            return $params;
        }
        foreach ($params as $name => $value) {
            if ($value === '') {
                unset($params[$name]);
            } else {
                if (is_array($value)) {
                    $stmtCondition = array();
                    foreach ($value as $val) {
                        $stmtCondition[] = "`{$name}` {$type} '{$val}'";
                    }
                    $stmtCondition = implode(' OR ', $stmtCondition);
                    $conditions[$name] = "{$secpator} ($stmtCondition)";
                    unset($stmtCondition);
                } else {
                    $conditions[$name] = "{$secpator} `{$name}` {$type} '{$value}'";
                }
            }
        }
        return $conditions;

    }

    /**
     * array('category_name'=>1,'comment' =>'hello')
     *
     * @param array $with
     * @return results
     */
    public function findWith($with = array())
    {

        $where = $this->addFilter($with);

        return $this->find($where);

    }

    public function getAllCategories()
    {

        $sql = "SELECT DISTINCT category_name FROM feedback";

        return $this->fetchArray($sql);

    }

    private function fetchArray($sql, $params = array())
    {
        global $db;
        $stmt = $db->prepare($sql);
        $results = array();
        if (!empty($params)) {
            foreach ($params as $k => &$value) {
                $stmt->bindParam($k, $value);
            }
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
        return $results;
    }

}