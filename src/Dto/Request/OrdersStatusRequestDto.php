<?php

namespace Ensi\B2Cpl\Dto\Request;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Получение статусов заказов на доставку
 * Class OrdersStatusRequestDto
 * @package Ensi\B2Cpl\Dto\Request
 *
 * @property string $code_type - тип кода, по которому осуществляет поиск отправлений, может
принимать значения: b2cpl - код присвоенный B2CPL и client - код присвоенный заказчиком
 * @property int $flag_customer - включать в отчет данные о получателе
 * @property int $flag_parts - включать в отчет данные о получателе
 * @property int $flag_photos - включает в ответ фото посылки
 * @property int $flag_history - включает в ответ историю статусов
 * @property int $flag_parcels - включает в ответ данные о местах (вес и габариты)
 * @property int $flag_bills - включает в ответ данные о счетах
 * @property int $flag_status_post - включает в ответ историю статусов Почты России
 * @property array|string[] $codes - массив номеров заказов, по которым осуществляется запрос
 */
class OrdersStatusRequestDto extends AbstractDto
{
    /** @var string - тип для кода B2CPL */
    public const CODE_TYPE_B2CPL = 'b2cpl';
    /** @var string - тип для кода клиента */
    public const CODE_TYPE_CLIENT = 'client';
}
