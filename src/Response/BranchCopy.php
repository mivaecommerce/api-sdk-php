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
use MerchantAPI\Model\Changeset;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Branch_Copy.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/branch_copy
 */
class BranchCopy extends Response
{
    /** @var ?\MerchantAPI\Model\Changeset */
    protected ?Changeset $changeset = null;

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
            $this->changeset = new Changeset($this->data['data']);
        }
    }

    /**
     * Get changeset.
     *
     * @return \MerchantAPI\Model\Changeset|null
     */
    public function getChangeset() : ?Changeset
    {
        return $this->changeset;
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
     * Get branch_copy_session_id.
     *
     * @return string
     */
    public function getBranchCopySessionId() : ?string
    {
        if (isset($this->data['branch_copy_session_id'])) {
            return $this->data['branch_copy_session_id'];
        }

        return null;
    }
}