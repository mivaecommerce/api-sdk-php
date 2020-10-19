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
use MerchantAPI\Model\Branch;
use MerchantAPI\BaseClient;

/**
 * Handles API Request BranchList_Delete.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/branchlist_delete
 */
class BranchListDelete extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'BranchList_Delete';

    /** @var int[] */
    protected $branchIds = [];

    /**
     * Get Branch_IDs.
     *
     * @return array
     */
    public function getBranchIds()
    {
        return $this->branchIds;
    }

    /**
     * Add Branch_IDs.
     *
     * @param int
     *
     * @return $this
     */
    public function addBranchId($branchId)
    {
        $this->branchIds[] = $branchId;
        return $this;
    }

    /**
     * Add Branch model.
     *
     * @param \MerchantAPI\Model\Branch
     * @return $this
     */
    public function addBranch(Branch $branch)
    {
        if ($branch->getId()) {
            $this->branchIds[] = $branch->getId();
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Branch_IDs'] = $this->getBranchIds();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\BranchListDelete($this, $httpResponse, $data);
    }
}