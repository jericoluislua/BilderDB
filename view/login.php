<?php
  /**
   * Login-Formular
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  $btnClass = "btn btn-success";
  $form = new Form("/login");
  $button = new ButtonBuilder();
  echo $form->input()->label('E-Mail')->name('loginemail')->type('email')->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Password')->name('loginpassword')->type('password')->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('Login')->name('logincheck')->type('submit')->class('btn-success');
  echo $button->end();
  echo $form->end();
  echo "<a href = '/registration'>No account? Click here</a>";
?>
