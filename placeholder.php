<?php

if(isset($_GET["menu"])){
    $menu = htmlspecialchars(stripslashes(trim($_GET["menu"])));

    if($menu==="add"){
        include("module/teacher/add.php");

    }else if($menu==="edit"){
        include("module/teacher/edit.php");

    }else if($menu==="update"){
        include("module/teacher/update.php");

    }else if($menu==="delete"){
        include("module/teacher/delete.php");

    }else if($menu==="exam_result") {
        include("module/teacher/exam_result.php");

    }else if($menu==="result_archive") {
        include("module/teacher/result_archive.php");
        
    }else if($menu==="take_exam") {
        include("module/student/take_exam.php");

    }else{
        include("signOut.php");
    }
}else{
    //security
}