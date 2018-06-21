<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 17.05.2018
 * Time: 08:41
 */
if(isset($_SESSION['loginEmail'])) {
    $lblClass = "col-md-2";
    $eltClass = "col-md-4";
    $btnClass = "btn btn-success";
    $form = new Form("/user");
    $button = new ButtonBuilder();
    echo $form->input()->label('new Username')->name('changeuname')->type('text')->lblClass($lblClass)->eltClass($eltClass)->required('false');
    echo $form->input()->label('new E-Mail')->name('changeemail')->type('email')->lblClass($lblClass)->eltClass($eltClass)->required('false');
    echo $form->input()->label('new Password')->name('changepassword')->type('password')->lblClass($lblClass)->eltClass($eltClass)->required('false');
    echo $button->start($lblClass, $eltClass);
    echo $button->label('Change')->name('changeinput')->type('submit')->class('btn-success');
    echo $button->label('Delete Account')->name('deleteacct')->type('button')->class('deletebtn');
    echo $button->end();
    echo $form->end();
}
?>
