<?php
if(isset($_SESSION['loginEmail'])){

    if(isset($_SESSION['isAdmin'])){
        echo 'Welcome admin ' . $_SESSION['loginEmail'];
    }
    else{
        echo 'Welcome ' . $_SESSION['loginEmail'];
    }
}
else{
    echo 'Welcome to BilderDB guest.';
}

?>