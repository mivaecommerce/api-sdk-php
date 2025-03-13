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
    /** @var ?\MerchantAPI\Model\Branch */
    protected ?Branch $branch = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($this->data['data'])) {
            $this->branch = new Branch($this->data['data']);
        }
    }

    /**
     * Get branch.
     *
     * @return \MerchantAPI\Model\Branch|null
     */
    public function getBranch() : ?Branch
    {
        return $this->branch;
    }
    /**
     * Get completed.
     *
     * @return bool
     */
    public function getCompleted() : ?bool
    {
        if (isset($this->data['completed'])) {
            return $this->data['completed'];
        }

        return false;
    }

    /**
     * Get branch_create_session_id.
     *
     * @return string
     */
    public function getBranchCreateSessionId() : ?string
    {
        if (isset($this->data['branch_create_session_id'])) {
            return $this->data['branch_create_session_id'];
        }

        return null;
    }
}