<?php

namespace Axm\DobaApi\Response;

use Axm\DobaApi\Collections\BrandsCollection;
use Axm\DobaApi\Collections\CategoriesCollection;
use Axm\DobaApi\Collections\ProductsCollection;
use Axm\DobaApi\Collections\SavedSearchesCollection;
use Axm\DobaApi\Collections\SuppliersCollection;

/**
 * Class SearchResponse
 * @package Axm\DobaApi\Response
 */
class SearchResponse extends ResponseBase
{
    /**
     * @var int
     */
    protected $display_count;

    /**
     * @var int
     */
    protected $display_start;

    /**
     * @var bool
     */
    protected $has_next_page;

    /**
     * @var string
     */
    protected $search_term;

    /**
     * @var int
     */
    protected $total_search_results;

    /**
     * @var array
     * @todo what does this hold?
     */
    protected $exact_match;

    /**
     * @var array
     * @todo what does this hold?
     */
    protected $specials;

    /**
     * @var array
     * @todo what does this hold?
     */
    protected $suggestion;

    /**
     * @var array
     * @todo what does this hold?
     */
    protected $top_sellers;

    /**
     * @var CategoriesCollection
     */
    protected $parent_categories;

    /**
     * @var ProductsCollection
     */
    protected $products;

    /**
     * @var SavedSearchesCollection
     */
    protected $saved_searches;

    /**
     * @var CategoriesCollection
     */
    protected $categories;

    /**
     * @var SuppliersCollection
     */
    protected $suppliers;

    /**
     * @var BrandsCollection
     */
    protected $brands;

    /**
     * @return CategoriesCollection
     */
    public function getCategories() : CategoriesCollection
    {
        return $this->categories;
    }

    /**
     * @param CategoriesCollection $categories
     */
    public function setCategories(CategoriesCollection $categories) : void
    {
        $this->categories = $categories;
    }

    /**
     * @return SuppliersCollection
     */
    public function getSuppliers() : SuppliersCollection
    {
        return $this->suppliers;
    }

    /**
     * @param SuppliersCollection $suppliers
     */
    public function setSuppliers(SuppliersCollection $suppliers) : void
    {
        $this->suppliers = $suppliers;
    }

    /**
     * @return BrandsCollection
     */
    public function getBrands() : BrandsCollection
    {
        return $this->brands;
    }

    /**
     * @param BrandsCollection $brands
     */
    public function setBrands(BrandsCollection $brands) : void
    {
        $this->brands = $brands;
    }

    /**
     * @return int
     */
    public function getDisplayCount() : int
    {
        return $this->display_count;
    }

    /**
     * @param int $display_count
     */
    public function setDisplayCount(int $display_count) : void
    {
        $this->display_count = $display_count;
    }

    /**
     * @return int
     */
    public function getDisplayStart() : int
    {
        return $this->display_start;
    }

    /**
     * @param int $display_start
     */
    public function setDisplayStart(int $display_start) : void
    {
        $this->display_start = $display_start;
    }

    /**
     * @return bool
     */
    public function isHasNextPage() : bool
    {
        return $this->has_next_page;
    }

    /**
     * @param bool $has_next_page
     */
    public function setHasNextPage(bool $has_next_page) : void
    {
        $this->has_next_page = $has_next_page;
    }

    /**
     * @return string
     */
    public function getSearchTerm() : string
    {
        return $this->search_term;
    }

    /**
     * @param string $search_term
     */
    public function setSearchTerm(string $search_term) : void
    {
        $this->search_term = $search_term;
    }

    /**
     * @return int
     */
    public function getTotalSearchResults() : int
    {
        return $this->total_search_results;
    }

    /**
     * @param int $total_search_results
     */
    public function setTotalSearchResults(int $total_search_results) : void
    {
        $this->total_search_results = $total_search_results;
    }

    /**
     * @return array
     */
    public function getExactMatch() : array
    {
        return $this->exact_match;
    }

    /**
     * @param array $exact_match
     */
    public function setExactMatch(array $exact_match) : void
    {
        $this->exact_match = $exact_match;
    }

    /**
     * @return array
     */
    public function getSpecials() : array
    {
        return $this->specials;
    }

    /**
     * @param array $specials
     */
    public function setSpecials(array $specials) : void
    {
        $this->specials = $specials;
    }

    /**
     * @return array
     */
    public function getSuggestion() : array
    {
        return $this->suggestion;
    }

    /**
     * @param array $suggestion
     */
    public function setSuggestion(array $suggestion) : void
    {
        $this->suggestion = $suggestion;
    }

    /**
     * @return array
     */
    public function getTopSellers() : array
    {
        return $this->top_sellers;
    }

    /**
     * @param array $top_sellers
     */
    public function setTopSellers(array $top_sellers) : void
    {
        $this->top_sellers = $top_sellers;
    }

    /**
     * @return CategoriesCollection
     */
    public function getParentCategories() : CategoriesCollection
    {
        return $this->parent_categories;
    }

    /**
     * @param CategoriesCollection $parent_categories
     */
    public function setParentCategories(CategoriesCollection $parent_categories) : void
    {
        $this->parent_categories = $parent_categories;
    }

    /**
     * @return ProductsCollection
     */
    public function getProducts() : ProductsCollection
    {
        return $this->products;
    }

    /**
     * @param ProductsCollection $products
     */
    public function setProducts(ProductsCollection $products) : void
    {
        $this->products = $products;
    }

    /**
     * @return SavedSearchesCollection
     */
    public function getSavedSearches() : SavedSearchesCollection
    {
        return $this->saved_searches;
    }

    /**
     * @param SavedSearchesCollection $saved_searches
     */
    public function setSavedSearches(SavedSearchesCollection $saved_searches) : void
    {
        $this->saved_searches = $saved_searches;
    }
}
