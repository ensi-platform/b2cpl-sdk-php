<?php

namespace Ensi\B2Cpl\Dto\Response\Part\Sticker;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Class StickerCodeDto
 * @package Ensi\B2Cpl\Dto\Response\Part\Sticker
 *
 * @property string $code - код заказа B2CPL
 * @property array|StickerCodeParcelDto[] $parcels - массив мест (указывается код места B2CPL, если не указан, то
наклейки формируются на все места), необязательный параметр
 */
class StickerCodeDto extends AbstractDto
{
    /**
     * StickerCodeDto constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->parcels = $this->parcels ?
            array_map(function ($item) {
                return new StickerCodeParcelDto($item);
            }, $this->parcels) :
            [];
    }
}
