<?php
if(isset($_SESSION['loginEmail'])){
    if(isset($galleries)) { ?>
    <?php foreach ($galleries as $gallery){

        if($gallery->userid == $user->id): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="gtitle">
                    <?= $gallery->title; ?>
                </p>
                </br>
                <p class="gdesc">
                    <?= $gallery->description; ?>
                </p>
                (<a class="deletelink" title="delete" href="/gallery/delete?id=<?= $gallery->id ?>">delete</a>)
            </div>
            <?php foreach ( $files as $file) { ?>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="gtitle">
                            <?= $file->title; ?>
                        </p>
                        </br>
                        <p class="gdesc">
                            <?= $file->description; ?>
                        </p>
                        (<a class="deletelink" title="delete" href="/post/delete?id=<?= $file->id ?>">delete</a>)
                    </div>
                    <div class="panel-body">
                        <p class="file">
                            <img src='<?=$file->path; ?>'/>
                        </p>
                    </div>
                </div>
            </div>
                <?php } ?>
        </div>

        <?php  endif;?>
    <?php } }else{ ?>
        <div class="nogallery">
            <h3>No gallery created.</h3>
        </div>
    <?php } }?>
