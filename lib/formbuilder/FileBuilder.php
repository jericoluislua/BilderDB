<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.05.2018
 * Time: 10:44
 */

class FileBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('label');
        $this->addProperty('name');
        $this->addProperty('type');
        $this->addProperty('value', null);
        $this->addProperty('lblClass');
        $this->addProperty('eltClass');
    }

    public function build()
    {
        $result  = "<div class='form-group'>\n";
        $result .= "<label class='{$this->lblClass} control-label' for='textinput'>{$this->label}</label>\n";
        $result .= "<div class='{$this->eltClass}'>\n";
        $result .= "<input name='{$this->name}' type='{$this->type}' value='{$this->value}' class='form-control' required>\n";
        $result .= "</div>\n";
        $result .= "</div>\n";
        return $result;

    }
}