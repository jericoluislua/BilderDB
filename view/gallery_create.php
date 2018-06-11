<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 11.06.2018
 * Time: 07:58
 */
$lblClass = "col-md-2";
$eltClass = "col-md-4";
$btnClass = "btn btn-success";
$form = new Form("/gallery/create");
$button = new ButtonBuilder();
echo $form->input()->label('Title')->name('gallerytitle')->type('text')->lblClass($lblClass)->eltClass($eltClass);
echo $form->input()->label('Description')->name('gallerydesc')->type('text')->lblClass($lblClass)->eltClass($eltClass);
echo $form->input()->label('Public')->name('galleryispublic')->type('checkbox')->lblClass($lblClass)->eltClass($eltClass);
echo $button->start($lblClass, $eltClass);
echo $button->label('Create')->name('gallerycreate')->type('submit')->class('btn-success');
echo $button->end();
echo $form->end();