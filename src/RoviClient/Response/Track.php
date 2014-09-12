<?php

namespace RoviTagger\RoviClient\Response;

class Track extends EntityAbstract
{
    /**
     * @var string[]
     */
    public $ids;

    /**
     * @var string
     */
    public $title;

    /**
     * @var Artist[]
     */
    public $performers;

    /**
     * @var Artist[]
     */
    public $composers;

    /**
     * @var string
     */
    public $part;

    /**
     * @var int
     */
    public $duration;

    /**
     * @var int
     */
    public $disc;

    /**
     * @var bool
     */
    public $isPick;

    /**
     * @var bool
     */
    public $hasReview;

    /**
     * @var string
     */
    public $sample;

    /**
     * @var int
     */
    public $number;

    /**
     * {@inheritDoc}
     */
    public static function fromObject($object)
    {
        $retval = new Track();

        $retval->ids        = (array) $object->ids;
        $retval->title      = $object->title;
        $retval->performers = Artist::fromObjectArray((array) $object->performers);
        $retval->composers  = Artist::fromObjectArray((array) $object->composers);
        $retval->part       = $object->part;
        $retval->duration   = $object->duration;
        $retval->disc       = $object->disc;
        $retval->isPick     = $object->isPick;
        $retval->hasReview  = $object->hasReview;
        $retval->sample     = $object->sample;
        $retval->flags      = $object->flags;
        $retval->number     = $object->array_index;

        return $retval;
    }

    /**
     * {@inheritDoc}
     *
     * Unfortunately, we need to duplicate this logic here, since we need the track index reset when the disc number
     * changes.
     */
    public static function fromObjectArray(array $objects)
    {
        if (!is_array($objects)) {
            throw new \InvalidArgumentException("Non-array supplied to `fromObjectArray()`.");
        }

        $discNumber  = null;
        $trackNumber = null;

        $retval = array();
        foreach ($objects as $object) {
            if ($object->disc !== $discNumber) {
                $trackNumber = 1;
                $discNumber  = $object->disc;
            }
            $object->array_index = $trackNumber++;
            $retval[] = static::fromObject($object);
        }
        return $retval;
    }

    public $flags;
}