<?php

function execute($sql)
{
    global $db;
    $result = $db->query($sql) or die($db->error);
    return $result;
}

function callProc($procName, $params)
{
    global $db;
    $result = [];
    $query = $db->query("CALL {$procName}({$params})") or die($db->error);
        if($query)
        {
            while ($row = $query->fetch_array())
            {
                array_push($result, $row);
            }
            // Free result set
            $query->close();
            $db->next_result();
        }
    return $result;
}

?>