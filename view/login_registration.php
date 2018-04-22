<?php
/**
 * Created by PhpStorm.
 * User: laffan
 * Date: 4/22/2018
 * Time: 8:40 PM
 */
$lblClass = "col-md-2";
$eltClass = "col-md-4";
$btnClass = "btn btn-success";
$form = new Form($GLOBALS['appurl']."/login");
$button = new ButtonBuilder();
echo $form->input()->label('E-Mail')->name('regemail')->type('email')->lblClass($lblClass)->eltClass($eltClass);
echo $form->input()->label('Password')->name('regpassword')->type('password')->lblClass($lblClass)->eltClass($eltClass);
echo $form->input()->label('repeat Password')->name('redopassword')->type('password')->lblClass($lblClass)->eltClass($eltClass);
echo $button->start($lblClass, $eltClass);
echo $button->label('Registrate')->name('regsubmit')->type('submit')->class('btn-success');
echo $button->end();
echo $form->end();
?>