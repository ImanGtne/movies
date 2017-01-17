<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 17/01/2017
 * Time: 13:40
 */

namespace Grill\Model;

class Error
{
    protected $value;
    protected $message;
    protected $field;

    public function __construct($field, $message, $value)
    {
        $this->field = $field;
        $this->message = $message;
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getField()
    {
        return $this->field;
    }

}