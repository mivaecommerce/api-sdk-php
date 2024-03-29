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
use MerchantAPI\Model\BusinessAccount;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for BusinessAccount_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/businessaccount_insert
 */
class BusinessAccountInsert extends Response
{
    /** @var ?\MerchantAPI\Model\BusinessAccount */
    protected ?BusinessAccount $businessAccount = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->businessAccount = new BusinessAccount($this->data['data']);
    }

    /**
     * Get businessAccount.
     *
     * @return \MerchantAPI\Model\BusinessAccount|null
     */
    public function getBusinessAccount() : ?BusinessAccount
    {
        return $this->businessAccount;
    }
}