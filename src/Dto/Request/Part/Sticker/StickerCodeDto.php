<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Sticker;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Class StickerCodeDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Sticker
 *
 * @property string $code - код заказа B2CPL
 * @property array|StickerCodeParcelDto[] $parcels - массив мест (указывается код места B2CPL, если не указан, то
наклейки формируются на все места), необязательный параметр
 */
class StickerCodeDto extends AbstractDto
{
}
