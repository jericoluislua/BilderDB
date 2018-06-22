<?php if(isset($galleries)) { ?>
    <?php foreach ($galleries as $gallery){ ?>
        <?php if($gallery->isPublic == 1): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="gtitle">
                        <?= $gallery->title; ?>
                    </p>
                    <p id="gcreator">
                        by <?= $gallery->username; ?>
                    </p>
                    </br>
                    <p class="gdesc">
                        <?= $gallery->description; ?>
                    </p>
                </div>
                <?php foreach ( $files as $file) {
                    if($file->galleryid == $gallery->id){?>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <p class="ftitle">
                                        <?= $file->title; ?>
                                    </p>
                                    </br>
                                    <p class="fdesc">
                                        <?= $file->description; ?>
                                    </p>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        <img class="file"src='<?=$file->path; ?>'/>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } }?>
            </div>
<?php endif; } }?>
