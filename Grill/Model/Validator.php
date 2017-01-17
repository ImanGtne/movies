<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 17/01/2017
 * Time: 13:39
 */

namespace Grill\Model;
class Validator
{
    private $errors = [];
    private $isValid = true;

    public function validateNotEmpty($string, $field, $message = "La valeur est vide !")
    {
        if (empty($string)){
            $this->addError($field, $message, $string);
        }
        return true;
    }

    public function validateLengthBetween($string, $field, $message = "La longueur est incorrecte !", $min = 0, $max = 100)
    {
        if (strlen($string) < $min || strlen($string) > $max){
            $this->addError($field, $message, $string);
        }
        return true;
    }

    public function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->addError($email);
        }
        return true;
    }

    public function validateInteger($int, $field, $message = "La valeur n'est pas un entier !")
    {
        if (!is_int($int)){
            $this->addError($field, $message, $int);
        }
        return true;
    }

    public function isValid()
    {
        return $this->isValid;
    }

    public function addError($field, $message, $value)
    {
        $this->isValid = false;
        $this->errors[] = new Error($field, $message, $value);
    }

    public function getErrors($field = null)
    {
        if (!empty($field)){
            return $this->getErrorsByField($field);
        }
        return $this->errors;
    }

    private function getErrorsByField($field)
    {
        $errors = [];
        foreach($this->errors as $error){
            if ($error->getField() == $field){
                $errors[] = $error;
            }
        }

        return $errors;
    }

    public function showErrors($field = null)
    {
        $errors = (!empty($field)) ? $this->getErrorsByField($field) : $this->errors;

        if (empty($errors)){
            return false;
        }

        echo '<ul>';
        foreach($errors as $error){
            echo '<li>' . $error->getMessage() . '</li>';
        }
        echo '</ul>';

    }

}