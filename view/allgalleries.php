<?php
if(isset($_SESSION['isAdmin'])){
    if(isset($galleries)) {
        foreach ($galleries as $gallery){ ?>
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
                    (<a class="deletelink" title="delete" href="/gallery/delete?id=<?= $gallery->id ?>">delete</a>)
                </div>
                <?php foreach ( $files as $file) {
                    if($file->galleryid == $gallery->id){?>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <p class="ftitle">
                                        <?= str_replace('_', ' ', $file->title); ?>
                                    </p>
                                    </br>
                                    <p class="fdesc">
                                        <?= $file->description; ?>
                                    </p>
                                    (<a class="deletelink" title="delete" href="/post/delete?fid=<?= $file->id ?>&fpath=<?= $file->path?>">delete</a>)
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

<?php } } }?>