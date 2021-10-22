<?php

namespace Ensi\B2Cpl\Dto\Response;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Ответ на создание заявки на заказ машины для забора посылок
 * Class CourierCallResponseDto
 * @package Ensi\B2Cpl\Dto\Response
 *
 * @property bool $result - номер сформированной заявки, либо значение -1 в случае ошибки
 * @property string $message - текстовое описание ошибки
 */
class CourierCallResponseDto extends AbstractDto
{
}