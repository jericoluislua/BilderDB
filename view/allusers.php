<?php
if(isset($_SESSION['isAdmin'])){
    if(isset($users)) { ?>
    <?php foreach ($users as $user){ ?>
        <div class="panel panel-default">
<!--            <div class="panel-heading"/>-->

            <div class="panel-body">
                <p class="udescription">
                    Username: <?= $user->username; ?>
                    </br>
                    Email: <?= $user->email; ?>
                    </br>
                    <?php
                    if($user->isAdmin == 1): ?>
                        admin
                        </br>
                    <?php else: ?>
                        not admin
                        </br>
                    <?php endif;?>
                    <a class="deletelink" title="delete" href="/user/delete?id=<?= $user->id ?>">delete</a>
                </p>
            </div>
        </div>
    <?php }} else{ ?>
    <div class="nouser">
        <h3>No user created.</h3>
    </div>
    <?php } } else{?>
    <p class="error">Not logged in</p>
<?php } ?>