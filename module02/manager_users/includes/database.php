<!-- db query -->
<?php
if (!defined('_CODE')) {
    die("Error! access not allow");
}

function query($sql, $data = [], $check = false)
{
    global $conn;
    $result = false;
    try {
        $statement = $conn->prepare($sql);
        if (!empty($data)) {
            $result = $statement->execute($data);
        } else {
            $result = $statement->execute();
        }
    } catch (Exception $e) {
        echo $e->getMessage() . '<br/>';
        echo 'File: ' . $e->getFile() . '<br/>';
        echo 'Line: ' . $e->getLine() . '<br/>';
        die();
    }
    if ($check) {
        return $statement;
    }
    return $result;
}

// ham insert
function insert($table, $data)
{
    $keys = array_keys($data);
    $fields = implode(',', $keys);
    $values = ':' . implode(', :', $keys);
    $sql = "insert into $table($fields) values($values)";
    return query($sql, $data);
}

// ham update
function update($table, $data, $where)
{
    $fields = '';
    foreach ($data as $key => $value) {
        $fields .= $key . '=:' . $key . ',';
    }
    $fields = rtrim($fields, ',');
    if (!empty($where)) {
        $sql = "update $table set $fields where $where";
        return query($sql, $data);
    } else {
        $sql = "update $table set $fields";
        return query($sql, $data);
    }
}

function delete($table, $where)
{
    $sql = "delete from $table where $where";
    return query($sql);
}

// lay nhieu dong du lieu
function getRaw($sql)
{
    $result = query($sql, [], true);
    if (is_object($result)) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

// lay 1 dong du lieu
function getOneRaw($sql)
{
    $result = query($sql, [], true);
    if (is_object($result)) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}

// dem so dong du lieu
function countRaw($sql)
{
    $result = query($sql, [], true);
    if (is_object($result)) {
        return $result->rowCount();
    }
}