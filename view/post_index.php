<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 09.06.2018
 * Time: 17:36
 */
if(isset($_SESSION['loginEmail'])){

    echo 'No uploaded posts yet.';
}
else{ ?>
<p class="error">Not logged in</p>
<?php } ?>
