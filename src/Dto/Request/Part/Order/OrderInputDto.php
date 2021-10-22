<?php

namespace Ensi\B2Cpl\Dto\Request\Part\Order;

use Ensi\B2Cpl\Dto\AbstractDto;

/**
 * Заказ на доставку для загрузки
 * Class OrderInputDto
 * @package Ensi\B2Cpl\Dto\Request\Part\Order
 *
 * @property string $invoice_number - номер накладной
 * @property string $sender - отправитель
 * @property string $code - уникальный код заказа в системе заказчика*
 * @property string $code_b2cpl - код B2CPL (если есть)
 * @property string $code_client - код клиента в системе заказчика (используется для объединения разных заказов в одну группу при обзвоне, это позволяет звонить получателю один раз по всем имеющимся заказам, а не по каждому отдельно)
 * @property string $fio - ФИО*
 * @property string $zip - индекс*
 * @property string $region - регион
 * @property string $city - город
 * @property string $address - адрес*
 * @property string $phone1 - телефон*
 * @property string $phone2 - дополнительный телефон
 * @property string $email - e-mail адрес
 * @property float $price_assess - оценочная стоимость заказа
 * @property float $price_delivery - полная стоимость доставки
 * @property float $price_delivery_pay - стоимость доставки к оплате
 * @property float $amount_prepaid - сумма предоплаты
 * @property string $delivery_type - тип доставки (code из функции TARIF)*
 * @property string $delivery_term - условия доставки
 * @property string $delivery_date - дата доставки
 * @property string $delivery_time - интервал доставки
 * @property int $flag_open - возможность вскрытия (по умолчанию 2): 0 - вскрытие запрещено; 1 - вскрытие разрешено; 2 - вскрытие только внешней упаковки
 * @property bool $flag_fitting - возможность примерки (true – примерка разрешена, false – примерка запрещена, по умолчанию false)
 * @property bool $flag_call - требуется подтверждение заказа (true/false, по умолчанию false)
 * @property bool $flag_delivery - требуется доставка B2CPL (true/false, по умолчанию true)
 * @property bool $flag_return - возможность возврата (true/false, по умолчанию true)
 * @property bool $flag_packing - требует упаковки (true/false), для клиентов с фулфилментом
 * @property string $comment - комментарий к заказу
 * @property array|OrderInputParcelDto[] $parcels - массив мест (коробок)*
 */
class OrderInputDto extends AbstractDto
{
}
