<?php

/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.05.2018
 * Time: 08:41
 */
$lblClass = "col-md-2";
$eltClass = "col-md-4";
$btnClass = "btn btn-success";
$form = new Form("/user");
$button = new ButtonBuilder();
echo $form->input()->label('Username')->name('uname')->type('text')->lblClass($lblClass)->eltClass($eltClass);
echo $form->input()->label('E-Mail')->name('email')->type('email')->lblClass($lblClass)->eltClass($eltClass);
echo $form->input()->label('Password')->name('password')->type('password')->lblClass($lblClass)->eltClass($eltClass);
echo $button->start($lblClass, $eltClass);
echo $button->label('Change')->name('changeinput')->type('submit')->class('btn-success');
echo $button->label('Delete Account')->name('deleteacct')->type('button')->class('delete');

echo $button->end();
echo $form->end();
?>