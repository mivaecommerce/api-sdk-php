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
use MerchantAPI\Collection;

/**
 * API Response for Provision_Domain.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/provision_domain
 */
class ProvisionDomain extends Response
{
    /** @var \MerchantAPI\Collection */
    protected Collection $provisionMessages;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->provisionMessages = new Collection();

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
     * @return \MerchantAPI\Collection
     */
    public function getProvisionMessages() : Collection
    {
        return $this->provisionMessages;
    }
}