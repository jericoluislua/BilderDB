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
    $form = new Form("/post/upload");
    $button = new ButtonBuilder();
    echo $form->file()->label('File')->name('fileupload')->type('file')->lblClass($lblClass)->eltClass($eltClass);
    echo $form->input()->label('Title')->name('filetitle')->type('text')->lblClass($lblClass)->eltClass($eltClass);
    echo $form->input()->label('Description')->name('filedesc')->type('text')->lblClass($lblClass)->eltClass($eltClass);

    echo $button->start($lblClass, $eltClass);
    echo $button->label('Upload')->name('filesubmit')->type('submit')->class('btn-success');
    echo $button->end();
    echo $form->end();