<?php
class factory {
    public static function get($className) {

        $isCommand = mb_strpos($className, "Command") !== false;
        if ($isCommand) {
            return new CommandDecorator(
                new $className
            );
        }

        return new $className;
    }
}

interface Command {
    public function do();
}

class CommandDecorator implements Command {

    /**
     * @var Command
     */
    protected $originalCommand;

    public function __construct($originalCommand) {
        $this->originalCommand = $originalCommand;
    }

    public function do()
    {
        echo "I am do() from ".self::class.PHP_EOL;
        $this->originalCommand->do();
    }
}

class UpdateResourceCommand implements Command {
    public function do()
    {
        echo "I am do() from ".self::class.PHP_EOL;
    }
}

class CreateResourceCommand implements Command {
    public function do()
    {
        echo "I am do() from ".self::class.PHP_EOL;
    }
}

/** @var $commands Command[] */
$commands =  [
    factory::get(UpdateResourceCommand::class),
    factory::get(CreateResourceCommand::class)
];

/** @var $command Command*/
foreach ($commands as $command) {
    $command->do();
}