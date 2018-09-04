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
     * @param array $supplierInformation_data
     * @return SupplierInformation
     */
    public static function fromSupplierInformationData(array $supplierInformation_data) : SupplierInformation
    {

        if ($supplierInformation_data['avg_qty_in_stock'] != (int)$supplierInformation_data['avg_qty_in_stock']) {
            var_dump($supplierInformation_data['avg_qty_in_stock']);
            die;
        }
        $supplierInformation_data['avg_qty_in_stock'] = (int)$supplierInformation_data['avg_qty_in_stock'];
        $supplierInformation_data['date_active'] = \DateTime::createFromFormat(
            'Y-m-d',
            $supplierInformation_data['date_active']
        );
        /** @var SupplierInformation $supplierInformation */
        $supplierInformation = self::fromArrayData(SupplierInformation::class, $supplierInformation_data);

//        return new SupplierInformation();
        return $supplierInformation;
    }
}
