<?php

namespace Ensi\B2Cpl\Dto\Request;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Request\Part\Sticker\StickerCodeDto;
use Ensi\B2Cpl\Dto\Request\Part\Sticker\StickerFormatDto;

/**
 * Формирование штрихкодов для заказа на доставку для всех или определенных мест заказа
 * Class StickerRequestDto
 * @package Ensi\B2Cpl\Dto\Request
 *
 * @property string $mode - режим формирования ответа (standart (по-умолчанию) – выдаёт ссылку на наклейку (и), pdf - выдаёт сразу pdf), необязательный параметр
 * @property StickerFormatDto $format - формат наклейки, обязательный параметр
 * @property array|StickerCodeDto[] $codes - массив кодов посылок (указываются коды B2CPL, полученные при регистрации
заказа через функцию ORDER)
 */
class StickerRequestDto extends AbstractDto
{
    /** @var string - выдаёт ссылку на наклейку (по-умолчанию) */
    public const MODE_STANDART = 'standart';
    /** @var string -  выдаёт сразу pdf */
    public const MODE_PDF = 'pdf';
}
