<?php

namespace Axm\DobaApi\Entity;

/**
 * Class SupplierInformation
 * @package Axm\DobaApi\Entity
 *
 * @method bool getAllowsCustomBranding()
 * @method void setAllowsCustomBranding(bool $allows_custom_branding)
 * @method bool getAllowsDirectRelationships()
 * @method void setAllowsDirectRelationships(bool $allows_direct_relationships)
 * @method array getAlerts()
 * @method void setAlerts(array $alerts)
 * @method int getAvgQtyInStock()
 * @method void setAvgQtyInStock(int $avg_qty_in_stock)
 * @method int getDaysToReceiveRefund()
 * @method void setDaysToReceiveRefund(int $days_to_receive_refund)
 * @method float getDropShipFee()
 * @method void setDropShipFee(float $drop_ship_fee)
 * @method \DateTimeInterface getDateActive()
 * @method void setDateActive(\DateTimeInterface $date_active)
 * @method string getDamagePolicy()
 * @method void setDamagePolicy(string $damage_policy)
 * @method string getDescription()
 * @method void setDescription(string $description)
 * @method string getMetaDescription()
 * @method void setMetaDescription(string $meta_description)
 * @method string getMetaKeywords()
 * @method void setMetaKeywords(string $meta_keywords)
 * @method string getReturnPolicy()
 * @method void setReturnPolicy(string $return_policy)
 * @method string getSpecialConditions()
 * @method void setSpecialConditions(string $special_conditions)
 * @method string getShippingCarriers()
 * @method void setShippingCarriers(string $shipping_carriers)
 * @method string getSummary()
 * @method void setSummary(string $summary)
 * @method string getShortagePolicy()
 * @method void setShortagePolicy(string $shortage_policy)
 * @method string getSellerType()
 * @method void setSellerType(string $seller_type)
 * @method string getAvgItemLifespan()
 * @method void setAvgItemLifespan(string $avg_item_lifespan)
 * @method string getAvgProcessingTime()
 * @method void setAvgProcessingTime(string $avg_processing_time)
 * @method string getAvgProductDiscount()
 * @method void setAvgProductDiscount(string $avg_product_discount)
 * @method string getAvgShipTime()
 * @method void setAvgShipTime(string $avg_ship_time)
 * @method string getClassification()
 * @method void setClassification(string $classification)
 * @method string getFulfillmentPercentage()
 * @method void setFulfillmentPercentage(string $fulfillment_percentage)
 * @method string getInventoryInfo()
 * @method void setInventoryInfo(string $inventory_info)
 * @method string getInventoryUpdateFrequency()
 * @method void setInventoryUpdateFrequency(string $inventory_update_frequency)
 * @method string getItemCount()
 * @method void setItemCount(string $item_count)
 * @method string getNotes()
 * @method void setNotes(string $notes)
 * @method string getNumInStock()
 * @method void setNumInStock(string $num_in_stock)
 * @method string getNumOutOfStock()
 * @method void setNumOutOfStock(string $num_out_of_stock)
 * @method string getProductAlerts()
 * @method void setProductAlerts(string $product_alerts)
 * @method string getRmaPercentage()
 * @method void setRmaPercentage(string $rma_percentage)
 */
class SupplierInformation extends EntityBase
{

    /**
     * @var bool
     */
    protected $allows_custom_branding;

    /**
     * @var bool
     */
    protected $allows_direct_relationships;

    /**
     * @var array
     */
    protected $alerts;

    /**
     * @var int
     */
    protected $avg_qty_in_stock;

    /**
     * @var int
     */
    protected $days_to_receive_refund;

    /**
     * @var float
     */
    protected $drop_ship_fee;

    /**
     * @var \DateTimeInterface
     */
    protected $date_active;

    /**
     * @var string
     */
    protected $damage_policy;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $meta_description;

    /**
     * @var string
     */
    protected $meta_keywords;

    /**
     * @var string
     */
    protected $return_policy;

    /**
     * @var string
     */
    protected $special_conditions;

    /**
     * @var string
     */
    protected $shipping_carriers;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var string
     */
    protected $shortage_policy;

    /**
     * @var string
     */
    protected $seller_type;

    /**
     * @var string
     */

    protected $avg_item_lifespan;
    /**
     * @var string
     */
    protected $avg_processing_time;
    /**
     * @var string
     */
    protected $avg_product_discount;
    /**
     * @var string
     */
    protected $avg_ship_time;
    /**
     * @var string
     */
    protected $classification;
    /**
     * @var string
     */
    protected $fulfillment_percentage;
    /**
     * @var string
     */
    protected $inventory_info;
    /**
     * @var string
     */
    protected $inventory_update_frequency;
    /**
     * @var string
     */
    protected $item_count;
    /**
     * @var string
     */
    protected $notes;
    /**
     * @var string
     */
    protected $num_in_stock;
    /**
     * @var string
     */
    protected $num_out_of_stock;
    /**
     * @var string
     */
    protected $product_alerts;
    /**
     * @var string
     */
    protected $rma_percentage;
}
