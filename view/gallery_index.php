
<?php if(isset($galleries)) { ?>
    <?php foreach ($galleries as $gallery){ ?>
        <div class="panel panel-default">
            <div class="panel-heading"> <?= $gallery->title; ?> </div>

            <div class="panel-body">
                <p class="gdescription">
                    <?= $gallery->description; ?>
                </p>
            </div>
        </div>
    <?php } }else{ ?>
        <div class="nogallery">
            <h3>No gallery created.</h3>
        </div>
    <?php } ?>
