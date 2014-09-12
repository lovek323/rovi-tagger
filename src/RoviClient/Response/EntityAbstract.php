<?php

namespace RoviTagger\RoviClient\Response;

abstract class EntityAbstract
{
    /**
     * @param object $object The JSON decoded object.
     * @throws \Exception This method is not implemented.
     * @return EntityAbstract
     */
    public static function fromObject($object)
    {
        throw new \Exception('Not implemented.');
    }

    /**
     * @param object[] $objects The JSON decoded object array.
     * @throws \InvalidArgumentException When $objects is not an array.
     * @return EntityAbstract[]
     */
    public static function fromObjectArray(array $objects)
    {
        if (!is_array($objects)) {
            throw new \InvalidArgumentException("Non-array supplied to `fromObjectArray()`.");
        }

        $retval = array();
        foreach ($objects as $index => $object) {
            $object->array_index = $index;
            $retval[] = static::fromObject($object);
        }
        return $retval;
    }
}