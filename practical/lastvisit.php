<!-- Write a PHP program to store current date-time in a COOKIE and display the "Last 
visited on date-time on the web page upon reopening of the same page -->
<?php
function setLastVisited(){
    $expiry = time() + (365*24*60*60);
    setcookie('lastvisited',date('Y-m-d H:i:s'),$expiry,'/');
}
if(isset($_COOKIE['lastvisited'])){
    echo 'Last visited: '.$_COOKIE['lastvisited'];
    setLastVisited();
}
else{
    setLastVisited();
    echo "First time visitor!!";
}
?>