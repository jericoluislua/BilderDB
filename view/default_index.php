<?php
if(isset($_SESSION['loginEmail'])){
    echo 'Welcome ' . $_SESSION['loginEmail'];
}
else{
    echo 'Welcome to BilderDB.';
}

?>