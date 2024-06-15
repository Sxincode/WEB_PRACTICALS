<!-- 16. Write a PHP program to store page views count in SESSION, to increment the count on each 
refresh, and to show the count on web page. -->

<?php
session_start();
if(isset($_SESSION['page_visits']))
{
    $_SESSION['page_visits']++;
}
else{
    $_SESSION['page_visits']=1;
}
echo "You have visted this page ".$_SESSION['page_visits']." times";
?>