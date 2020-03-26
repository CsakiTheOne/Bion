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
    $result = $db->query('CALL '.$procName.'('.$params.')') or die($db->error);
    return $result;
}

?>