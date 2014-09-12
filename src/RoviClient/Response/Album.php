<?php

namespace RoviTagger\RoviClient\Response;

class Album extends EntityAbstract
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
    public $primaryArtists;

    /**
     * @var Artist[]
     */
    public $guestArtists;

    /**
     * @var mixed
     */
    public $flags;

    /**
     * @var int
     */
    public $duration;

    /**
     * @var string
     */
    public $originalReleaseDate;

    /**
     * @var int
     */
    public $rating;

    /**
     * @var bool
     */
    public $isPick;

    /**
     * @var Genre[]
     */
    public $genres;

    /**
     * @var string
     */
    public $headlineReview;

    /**
     * @var ClassicalReview
     */
    public $classicalReview;

    /**
     * @var Credit[]
     */
    public $credits;

    /**
     * @var Track[]
     */
    public $tracks;

    /**
     * @var Style[]
     */
    public $styles;

    /**
     * {@inheritDoc}
     */
    public static function fromObject($object)
    {
        $retval = new Album();

        $retval->ids                 = (array) $object->ids;
        $retval->title               = $object->title;
        $retval->primaryArtists      = Artist::fromObjectArray($object->primaryArtists);
        $retval->guestArtists        = Artist::fromObjectArray((array) $object->guestArtists);
        $retval->flags               = $object->flags;
        $retval->duration            = $object->duration;
        $retval->originalReleaseDate = $object->originalReleaseDate;
        $retval->rating              = $object->rating;
        $retval->isPick              = $object->isPick;
        $retval->genres              = Genre::fromObjectArray($object->genres);
        $retval->headlineReview      = $object->headlineReview;
        $retval->classicalReview     = ClassicalReview::fromObject($object->classicalReview);
        $retval->credits             = Credit::fromObjectArray($object->credits);
        $retval->tracks              = Track::fromObjectArray((array) $object->tracks);
        $retval->styles              = Style::fromObjectArray((array) $object->styles);

        return $retval;
    }
}