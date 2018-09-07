<?php

namespace Axm\DobaApi\Api;

use Axm\DobaApi\Collections\SuppliersCollection;
use Axm\DobaApi\Factories\ProductFactory;
use Axm\DobaApi\Factories\SearchResponseFactory;
use Axm\DobaApi\Factories\SupplierFactory;
use Axm\DobaApi\Response\SearchResponse;
use Cake\Utility\Hash;

/**
 * Class ProductsApi
 * @package Axm\DobaApi\Api
 */
class ProductsApi extends ApiBase
{
    /**
     * @param string[] $supplier_ids
     * @return SuppliersCollection
     * @throws \Axm\DobaApi\DobaResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getSuppliers(array $supplier_ids = []) : SuppliersCollection
    {
        $options = count($supplier_ids)
            ? ['supplier_ids.supplier_id' => $supplier_ids]
            : [];
        $response = $this->getRequest()->call('getSuppliers', $options);

        $supplier_data = Hash::get($response, 'suppliers.supplier', []);

        return SupplierFactory::collectionFromArrayData($supplier_data);
    }

    /**
     * @param string $search_term
     * @param int $start
     * @param int $limit
     * @param array $options
     * @return mixed
     * @throws \Axm\DobaApi\DobaResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function searchCatalog(
        string $search_term = '',
        int $start = 1,
        int $limit = 500,
        array $options = []
    ) : SearchResponse {
        $options['search_term'] = $search_term;
        $options['display_start'] = $start;
        $options['display_count'] = $limit;

        $response = $this->getRequest()->call('searchCatalog', $options);

        return SearchResponseFactory::fromData($response);
    }

    public function getProductDetail(array $options = [])
    {
        $response = $this->getRequest()->call('getProductDetail', $options);

        return ProductFactory::collectionFromArrayData($response['products']['product']);
    }

    public function getProductInventory(array $options = [])
    {
        throw new \BadMethodCallException('getProductInventory is not yet implemented');
    }

    public function getListsSummary(array $options = [])
    {
        throw new \BadMethodCallException('getListsSummary is not yet implemented');
    }

    public function editList(array $options = [])
    {
        throw new \BadMethodCallException('editList is not yet implemented');
    }
}
