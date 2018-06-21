<?php if(isset($galleries)) { ?>
    <?php foreach ($galleries as $gallery){ ?>
        <?php if($gallery->isPublic == 1): ?>
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
                </div>
                <div class="panel-body">

                </div>
            </div>
        <?php endif;?>
    <?php } }else{ ?>
    <div class="nogallery">
        <h3>No gallery created.</h3>
    </div>
<?php } ?>
