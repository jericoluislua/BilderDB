<?php
    /**
     * Created by PhpStorm.
     * User: vmadmin
     * Date: 18.05.2018
     * Time: 10:38
     */
    $lblClass = "col-md-2";
    $eltClass = "col-md-4";
    $btnClass = "btn btn-success";
    $form = new Form("/post");
    $button = new ButtonBuilder();
    echo $button->start($lblClass, $eltClass);
    echo $form->file()->label('Picture')->name('pictureupload')->type('file')->lblClass($lblClass)->eltClass($eltClass);
    echo $button->label('Upload')->name('filesubmit')->type('submit')->class('btn-success');
    echo $button->end();
    echo $form->end();