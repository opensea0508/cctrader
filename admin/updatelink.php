<?php

require '../user/clean.php';
$code = bin2hex(random_bytes(12));
$folder = 'files';

if(isset($_POST['link'])){
    $id = clean($_POST['id']);
    $email = clean($_POST['email']);
    $link = clean($_POST['link']);

    $sql = runQuery("UPDATE dregister SET turl='$link' WHERE demail='$email' AND userid='$id' ");

    if($sql){
        $_SESSION['msg']='<div class="alert alert-success" role="alert">
                        <strong>Success!</strong> <br>
                        Trade Monitor Room link updated successfully!.
                    </div>';
                }
    header("Location: user-details?id=$id&email=$email");
    
}