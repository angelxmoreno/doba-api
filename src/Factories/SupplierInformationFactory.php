<?php

namespace Axm\DobaApi\Factories;

use Axm\DobaApi\Entity\SupplierInformation;

/**
 * Class SupplierInformationFactory
 * @package Axm\DobaApi\Factories
 */
class SupplierInformationFactory extends FactoryBase
{
    /**
     * @param array $data
     * @return SupplierInformation
     */
    public static function fromData(array $data) : SupplierInformation
    {
        if ($data['avg_qty_in_stock'] != (int)$data['avg_qty_in_stock']) {
            var_dump($data['avg_qty_in_stock']);
            die;
        }
        $data['avg_qty_in_stock'] = (int)$data['avg_qty_in_stock'];
        $data['date_active'] = \DateTime::createFromFormat(
            'Y-m-d',
            $data['date_active']
        );
        /** @var SupplierInformation $supplierInformation */
        $supplierInformation = self::hydrate(SupplierInformation::class, $data);

        return $supplierInformation;
    }
}
