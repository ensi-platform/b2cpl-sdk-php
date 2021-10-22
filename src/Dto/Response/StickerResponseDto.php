<?php

namespace Ensi\B2Cpl\Dto\Response;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Dto\Response\Part\Sticker\StickerCodeDto;

/**
 * Class StickerResponseDto
 * @package Ensi\B2Cpl\Dto\Response
 *
 * @property string $link - ссылка на pdf наклейку (ссылка актуальна в течении недели с момента создания)
 * @property array|StickerCodeDto[] $codes_success - массив заказов на которые успешно созданы наклейки
 * @property array|StickerCodeDto[] $codes_errors - массив заказов на которые наклейки не созданы
 * @property bool $success - показывает успешно ли выполнен запрос
 * @property string $message - описание ошибки (если success = false), свободный текст
 */
class StickerResponseDto extends AbstractDto
{
    /**
     * StickerResponseDto constructor.
     * @param  array  $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->codes_success = $this->codes_success ?
            array_map(function ($item) {
                return new StickerCodeDto($item);
            }, $this->codes_success) :
            [];
        $this->codes_errors = $this->codes_errors ?
            array_map(function ($item) {
                return new StickerCodeDto($item);
            }, $this->codes_errors) :
            [];
    }
}
