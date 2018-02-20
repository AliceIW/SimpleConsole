<?php
/**
 * Created by PhpStorm.
 * User: AliceIW
 * Date: 20/02/2018
 * Time: 22:55
 */
namespace AliceIw\SimpleConsole;

use Closure;

class SimpleConsole
{
    /**
     * @var array
     */
    protected $arguments;

    /**
     * @var object
     */
    protected $commandClass;

    /**
     * @var array[SimpleOptions]
     */
    protected $options;

    /**
     * SimpleConsole constructor.
     * @param array $arguments
     */
    public function __construct(array $arguments)
    {
        array_shift($arguments);
        $this->arguments = $arguments;
    }

    /**
     * @param $commandClass
     * @return SimpleConsole
     */
    public function setCommand(Closure $commandClass)
    {
        $this->commandClass = $commandClass();
        return $this;
    }

    public function addOption(SimpleOption $simpleOption)
    {
        $this->options[] = $simpleOption;
    }

    public function run(Closure $closure)
    {
        $closure($this->commandClass, $this->availableOptions());
    }

    protected function availableOptions()
    {
        $availableOptions = [];
        $totalArguments = count($this->arguments);

        for ($i = 0; $i < $totalArguments; $i++) {
            $argument = $this->arguments[$i];
            foreach ($this->options as $option) {
                if ($option->is($argument)) {
                    if ($option->hasParameter()) {
                        $i++;
                        $option->setValue($this->arguments[$i]);
                    }
                    $availableOptions[$option->getOptionName()] = $option;
                    break;
                }
            }
        }
        return $availableOptions;
    }

}