<?php
    /**
     * Created by PhpStorm.
     * User: vmadmin
     * Date: 07.06.2018
     * Time: 08:22
     */
    $lblClass = "col-md-2";
    $eltClass = "col-md-4";
    $btnClass = "btn btn-success";
    $form = new Form("/gallery");
    $button = new ButtonBuilder();
    $checkbox = new CheckBoxBuilder();
    echo $form->input()->label('Title')->name('gallerytitle')->type('text')->lblClass($lblClass)->eltClass($eltClass);
    echo $form->input()->label('Description')->name('gallerydesc')->type('text')->lblClass($lblClass)->eltClass($eltClass);
    echo $checkbox->label('Public')->name('gallerypublic')->type('checkbox')->lblClass($lblClass)->eltClass($eltClass);
    echo $button->start($lblClass, $eltClass);
    echo $button->label('Upload')->name('gallerycreate')->type('submit')->class('btn-success');
    echo $button->end();
    echo $form->end();