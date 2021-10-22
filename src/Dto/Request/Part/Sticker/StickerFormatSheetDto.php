<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Sticker;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Class StickerFormatSheetDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Sticker
 *
 * @property int $width - ширина листа в мм, необязательный параметр
 * @property int $height - высота листа в мм, необязательный параметр
 * @property array|int[] $padding - размер полей на листе по аналогии с CSS, необязательный параметр (пример,  [5, 5, 5, 5])
 */
class StickerFormatSheetDto extends AbstractDto
{
}
