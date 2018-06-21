<?php
  /**
   * Erstellt ein Input-Feld für ein Formular.
   * Der Typ ist beliebig (text, email, password), nur 1 Feld pro Zeile.
   */
  class InputBuilder extends Builder
  {
    public function __construct()
    {
      $this->addProperty('label');
      $this->addProperty('name');
      $this->addProperty('type');
      $this->addProperty('value', null);
      $this->addProperty('lblClass');
      $this->addProperty('eltClass');
      $this->addProperty('required');
    }
    public function build()
    {
      $result  = "<div class='form-group'>\n";
      $result .= "<label class='{$this->lblClass} control-label' for='textinput'>{$this->label}</label>\n";
      $result .= "<div class='{$this->eltClass}'>\n";
      if($this->required == "true"){
          $result .= "<input name='{$this->name}' type='{$this->type}' value='{$this->value}' class='form-control' required>\n";
      }
      else if($this->required == "false"){
          $result .= "<input name='{$this->name}' type='{$this->type}' value='{$this->value}' class='form-control'>\n";
      }
      $result .= "</div>\n";
      $result .= "</div>\n";
      return $result;
    }
  }
?>