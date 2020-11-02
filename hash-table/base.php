<?php
interface IHashTable
{
    public function get($key);
    public function set($key, $value);
}

class HashTableFactory
{
    const OPEN_ADDRESSING_IMPLEMENTATION = 'OPEN_ADDRESSING_IMPLEMENTATION';
    const CLOSED_ADDRESSING_IMPLEMENTATION = 'CLOSED_ADDRESSING_IMPLEMENTATION';

    public function make($implementationType, $size)
    {
        switch($implementationType) {
            case self::OPEN_ADDRESSING_IMPLEMENTATION :
                return new OpenAddressingHashTable($size);

            case self::CLOSED_ADDRESSING_IMPLEMENTATION:
                return new CloseAddressingHashTable($size);

            default:
                throw new \Exception("HashTable of $implementationType not implemented\n");
        }
    }
}

/**
 * Открытая адресация - реалциция с использванием цепочек
 * т.е. в случае коллизии происходит добавление элемента
 * в список соотвествующего бакета
 *
 * Class OpenAddressingHashTable
 */
class OpenAddressingHashTable implements IHashTable
{
    protected $size;
    protected $table;

    /**
     * OpenAddressingHashTable constructor.
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->table = [];
    }

    public function get($originalKey)
    {
        if (is_string($originalKey)) {
            $key = mb_strlen($originalKey);
        }
        else {
            $key = $originalKey;
        }

        $hash = $key % $this->size;
        if (isset($this->table[$hash])) {
            $chain = $this->table[$hash];
            $i = 0;
            while($i < count($chain)) {
                $keyValuePair = $chain[$i];
                if ($originalKey == $keyValuePair->getKey()) {
                    return $keyValuePair->getValue();
                }
                $i++;
            }
        }
    }

    public function set($key, $value)
    {
        $keyValuePair = new KeyValuePair($key, $value);

        if (is_string($key)) {
            $key = mb_strlen($key);
        }

        $hash = $key % $this->size;
        if (isset($this->table[$hash])) {
            $this->table[$hash][] = $keyValuePair;
        }
        else {
            $this->table[$hash] = [$keyValuePair];
        }
    }
}

class KeyValuePair
{
    protected $key;
    protected $value;

    public function __construct($key, $value) {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }
}

// Need to finish closed addressing implementation
class CloseAddressingHashTable implements IHashTable
{
    protected $size;
    protected $table;

    public function __construct($size)
    {
        $this->size = $size;
        $this->table = [];
    }

    public function get($originalKey)
    {
        if (is_string($originalKey)) {
            $key = mb_strlen($originalKey);
        }
        else {
            $key = $originalKey;
        }

        $hash = $key % $this->size;
        if (isset($this->table[$hash])) {
            if ($originalKey == $this->table[$hash]->getKey()) {

            }
            else {

            }
        }
    }

    public function set($key, $value)
    {

    }
}