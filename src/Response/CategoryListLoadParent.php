<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * $Id$
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\Category;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CategoryList_Load_Parent.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/categorylist_load_parent
 */
class CategoryListLoadParent extends Response
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\Category[] */
    protected $categories = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->categories = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }
        
        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->categories[] = new Category($result);
            }
        }
    }

    /**
     * Get categories.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }
}