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
use MerchantAPI\Model\ProvisionMessage;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Provision_Store.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/provision_store
 */
class ProvisionStore extends Response
{
    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ProvisionMessage[] */
    protected $provisionMessages = [];

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->provisionMessages = new \MerchantAPI\Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->provisionMessages[] = new ProvisionMessage($result);
            }
        }
    }

    /**
     * Get provisionMessages.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\ProvisionMessage[]
     */
    public function getProvisionMessages()
    {
        return $this->provisionMessages;
    }
}