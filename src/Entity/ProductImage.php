<?php

namespace Axm\DobaApi\Entity;

/**
 * Class ProductImage
 * @package Axm\DobaApi\Entity
 *
 * @method string getImageUrl()
 * @method void setImageUrl(string $image_url)
 * @method int getImageHeight()
 * @method void setImageHeight(int $image_height)
 * @method int getImageWidth()
 * @method void setImageWidth(int $image_width)
 * @method string getThumbUrl()
 * @method void setThumbUrl(string $thumb_url)
 * @method int getThumbWidth()
 * @method void setThumbWidth(int $thumb_width)
 * @method int getThumbHeight()
 * @method void setThumbHeight(int $thumb_height)
 */
class ProductImage extends EntityBase
{

    /**
     * @var string
     */
    protected $image_url;

    /**
     * @var int
     */
    protected $image_height;

    /**
     * @var int
     */
    protected $image_width;

    /**
     * @var string
     */
    protected $thumb_url;

    /**
     * @var int
     */
    protected $thumb_width;

    /**
     * @var int
     */
    protected $thumb_height;
}
