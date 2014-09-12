<?php

namespace RoviTagger\RoviClient\Response;

class ClassicalReview extends EntityAbstract
{
    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $author;

    /**
     * {@inheritDoc}
     */
    public static function fromObject($object)
    {
        if ($object === null) {
            return null;
        }

        if (!is_object($object)) {
            throw new \InvalidArgumentException("Non-object passed in to `fromObject()`.");
        }

        $retval = new ClassicalReview();

        $retval->text   = $object->text;
        $retval->author = $object->author;

        return $retval;
    }
}
