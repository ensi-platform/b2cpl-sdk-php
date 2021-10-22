<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Sticker;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Class StickerFormatDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Sticker
 *
 * @property string $type - тип формата, обязательный параметр
 *  free – свободный (параметры задаёт пользователь),
 *  58x60 – одиночная наклейка 58мм*60мм (padding: 2мм),
 *  76x51 – одиночная наклейка 76мм*51мм (padding: 2мм),
 *  70x28_a4 – наклейки 70мм*28мм (padding: 2мм), на листе формата А4 (padding: 0мм)
 * @property int $width - ширина наклейки в мм, обязателен для формата free
 * @property int $height - высота наклейки в мм, обязателен для формата free
 * @property array|int[] $padding - размер полей по аналогии с CSS, необязательный параметр (пример,  [5, 5, 5, 5])
 * @property StickerFormatSheetDto $sheet - формат листа, необязательный параметр
 */
class StickerFormatDto extends AbstractDto
{
    /** @var string - свободный (параметры задаёт пользователь) */
    public const TYPE_FREE = 'free';
    /** @var string - одиночная наклейка 58мм*60мм (padding: 2мм) */
    public const TYPE_58_60 = '58x60';
    /** @var string - одиночная наклейка 76мм*51мм (padding: 2мм) */
    public const TYPE_76_51 = '76x51';
    /** @var string - наклейки 70мм*28мм (padding: 2мм), на листе формата А4 (padding: 0мм) */
    public const TYPE_70_28_A4 = '70x28_a4';
}
