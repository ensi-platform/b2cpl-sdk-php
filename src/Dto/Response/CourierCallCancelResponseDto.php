<?php

namespace Ensi\B2Cpl\Dto\Response;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Ответ на отмену заявки на заказ машины для забора посылок
 * Class CourierCallCancelResponseDto
 * @package Ensi\B2Cpl\Dto\Response
 *
 * @property bool $result - признак успешной операции 1, либо значение -1 в случае ошибки
 * @property string $message - текстовое описание ошибки
 */
class CourierCallCancelResponseDto extends AbstractDto
{
}