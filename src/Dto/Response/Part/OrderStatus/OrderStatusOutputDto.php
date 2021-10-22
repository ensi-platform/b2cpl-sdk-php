<?php

namespace Ensi\B2Cpl\Dto\Response\Part\OrderStatus;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Статус заказа на доставку
 * Class OrderStatusOutputDto
 * @package Ensi\B2Cpl\Dto\Response\Part\OrderStatus
 *
 * @property bool $success - указывает успешно ли получен статус по отправлению (если false, то
продолжать разбор ответа нет смысла, поля без данных могут отсутствовать)
 * @property string $message - сообщение от сервиса/описание ошибок загрузки
 * @property string $code - код, по котором осуществлялся запрос статуса
 * @property string $code_b2cpl - код отправления присвоенный B2CPL
 * @property string $code_client - код отправления присвоенный заказчиком
 * @property string $status_b2cpl - статус отправления
 * @property string $status_b2cpl_date - дата статуса
 */
class OrderStatusOutputDto extends AbstractDto
{
}
