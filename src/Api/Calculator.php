<?php

namespace Ensi\B2Cpl\Api;

use Ensi\B2Cpl\Dto\Request\TariffRequestDto;
use Ensi\B2Cpl\Dto\Response\TariffResponseDto;

/**
 * Class Calculator
 * @package Ensi\B2Cpl\Api
 */
class Calculator extends AbstractApi
{
    /**
     * Расчитывает стоимость доставки
     * @param TariffRequestDto $request
     * @return TariffResponseDto
     */
    public function calculate(TariffRequestDto $request): TariffResponseDto
    {
        $resultJson = $this->adapter->post('tarif', [], $request->toArray());
        $result     = json_decode($resultJson, true);

        return new TariffResponseDto($result);
    }
}
