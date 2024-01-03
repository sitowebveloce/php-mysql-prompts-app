<?php
require "dbprompts.php";
$isDelete = ($_POST['_method'] ?? '' == 'delete');
// var_dump($_POST['_method']);
// var_dump($_SERVER['REQUEST_METHOD']);
$isPost = ($_SERVER['REQUEST_METHOD']) == 'POST';
$isDeleteRequest = $isDelete && $isPost;
// echo $isDeleteRequest;
if ($isDeleteRequest) {
    $id = $_POST['id'];
    // echo $id;
    $query = 'DELETE FROM prompts WHERE id = :id';
    $param = ['id' => $id];
    $stmt = $db->prepare($query);
    $stmt->execute($param);
    header('Location:index.php', true, 0);
};
