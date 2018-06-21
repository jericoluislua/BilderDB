<?php
if(isset($_SESSION['isAdmin'])){
    if(isset($galleries)) { ?>
    <?php foreach ($galleries as $gallery){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="gallery">
                    <p class="gtitle">
                        <?= $gallery->title; ?>
                    </p>
                    <p class="gcreator">
                        by <?= $gallery->username; ?>
                    </p>
                    </br>
                    <p class="gdesc">
                        <?= $gallery->description; ?>
                    </p>
                    <p class="deletep">
                    (<a class="deletelink" title="delete" href="/allgalleries/delete?id=<?= $gallery->id ?>">delete</a>)
                    </p>
                </p>
            </div>
            <div class="panel-body">

            </div>
        </div>
    <?php }?>
<?php } } else{?>
<p class="error">Not logged in</p>
<?php } ?>