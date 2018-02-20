<?php
/**
 * Created by PhpStorm.
 * User: AliceIW
 * Date: 20/02/2018
 * Time: 22:56
 */

namespace AliceIw\SimpleConsole;


class SimpleOption
{
    private $name;

    private $aka;

    private $description;

    private $hasParameter;

    private $value = null;

    private $optionName;

    public function __construct($optionName)
    {
        $this->optionName = $optionName;
    }

    /**
     * @param string $option
     * @return bool
     */
    public function is(string $option)
    {
        return (strcasecmp($this->aka, $option) == 0) || (strcasecmp($this->name, $option) == 0);
    }

    /**
     * @param mixed $name
     * @return SimpleOption
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $aka
     * @return SimpleOption
     */
    public function setAka($aka)
    {
        $this->aka = $aka;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return SimpleOption
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function hasParameter()
    {
        return $this->hasParameter;
    }

    /**
     * @param mixed $hasParameter
     * @return SimpleOption
     */
    public function setHasParameter($hasParameter)
    {
        $this->hasParameter = $hasParameter;
        return $this;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getOptionName()
    {
        return $this->optionName;
    }
}