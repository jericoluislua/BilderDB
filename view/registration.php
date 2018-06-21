<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 26.04.2018
 * Time: 08:36
 */
require_once '../repository/LoginRepository.php';
/**
 * Registratons-Formular
 * Das Formular wird mithilfe des Formulargenerators erstellt.
 */
$lblClass = "col-md-2";
$eltClass = "col-md-4";
$btnClass = "btn btn-success";
$loginRepository = new LoginRepository();
$form = new Form("/registration");

$button = new ButtonBuilder();
echo $form->input()->label('Username')->name('reguname')->type('text')->lblClass($lblClass)->eltClass($eltClass)->required('true');
echo $form->input()->label('E-Mail')->name('regemail')->type('email')->lblClass($lblClass)->eltClass($eltClass)->required('true');
echo $form->input()->label('Password')->name('regpassword')->type('password')->lblClass($lblClass)->eltClass($eltClass)->required('true');
echo $form->input()->label('Redo Password')->name('redopassword')->type('password')->lblClass($lblClass)->eltClass($eltClass)->required('true');
echo $button->start($lblClass, $eltClass);
echo $button->label('Registration')->name('regsubmit')->type('submit')->class('btn-success');
echo $button->end();
echo $form->end();
?>
