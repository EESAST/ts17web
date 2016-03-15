<?php

namespace app\controllers;
use Yii;
use yii\helpers\Html;

$link = mysqli_connect("localhost","root","tttsss17","ts18web") or die("Could not connect database");
$forumid=($_POST['forumid']);
$userid=($_POST['userid']);


if(is_numeric($forumid) && is_numeric($userid)){

    $query1=mysqli_query($link,"SELECT * FROM user WHERE id = '$userid'");
    $count1=mysqli_num_rows($query1);
    if ($count1>0) {
        $query=mysqli_query($link,"SELECT * FROM likehistory WHERE forumid = '$forumid' AND userid = '$userid'");
        $count=mysqli_num_rows($query);

        if($count!=0){
            echo "error||您已赞过";
        }else{
            $hhh='plike';
            $query="UPDATE forum SET $hhh=$hhh+1 WHERE id='$forumid'";
            $res=mysqli_query($link,$query);

            mysqli_query($link,"INSERT INTO likehistory (forumid,userid) VALUES ('$forumid','$userid')");

            $query="SELECT $hhh FROM forum WHERE id='$forumid'";
            $res=mysqli_query($link,$query);
            $result=mysqli_fetch_array($res);
            $count=$result['plike'];

            echo "success||".$count;
        }
    }
    else{
        echo "error||您还没注册";
    }

}
else{
    echo "error||不是数字";
}
?>