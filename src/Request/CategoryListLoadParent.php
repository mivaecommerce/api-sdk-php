<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Category;
use MerchantAPI\BaseClient;

/**
 * Handles API Request CategoryList_Load_Parent.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/categorylist_load_parent
 */
class CategoryListLoadParent extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'CategoryList_Load_Parent';

    /** @var int */
    protected $parentId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Category
     */
    public function __construct(BaseClient $client = null, Category $category = null)
    {
        parent::__construct($client);
        if ($category) {
            $this->setParentId($category->getId());
        }
    }

    /**
     * Get Parent_ID.
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set Parent_ID.
     *
     * @param int
     * @return $this
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Parent_ID'] = $this->getParentId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\CategoryListLoadParent($this, $httpResponse, $data);
    }
}