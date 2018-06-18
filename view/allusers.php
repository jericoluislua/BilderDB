<?php if(isset($users)) { ?>
    <?php foreach ($users as $user){ ?>
        <div class="panel panel-default">
<!--            <div class="panel-heading"/>-->

            <div class="panel-body">
                <p class="udescription">
                    Username: <?= $user->username; ?>
                    </br>
                    Email: <?= $user->email; ?>
                </p>
            </div>
        </div>
    <?php } }else{ ?>
    <div class="nouser">
        <h3>No user created.</h3>
    </div>
<?php } ?>