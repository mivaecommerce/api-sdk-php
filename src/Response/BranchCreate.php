<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Response;

use MerchantAPI\Response;
use MerchantAPI\Model\Branch;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Branch_Create.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/branch_create
 */
class BranchCreate extends Response
{
    /** @var \MerchantAPI\Model\Branch */
    protected $branch;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->branch = new Branch($this->data['data']);
    }

    /**
     * Get branch.
     *
     * @return \MerchantAPI\Model\Branch|null
     */
    public function getBranch()
    {
        return $this->branch;
    }
}