<?php
if(isset($_SESSION['LoggedIn'])){
    echo 'Welcome ' . $_SESSION['LoggedIn'];
}
else{
    echo 'Welcome to BilderDB.';
}

?>