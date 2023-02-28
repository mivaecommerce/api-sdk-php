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
use MerchantAPI\Model\AvailabilityGroup;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for AvailabilityGroup_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/availabilitygroup_insert
 */
class AvailabilityGroupInsert extends Response
{
    /** @var ?\MerchantAPI\Model\AvailabilityGroup */
    protected ?AvailabilityGroup $availabilityGroup = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->availabilityGroup = new AvailabilityGroup($this->data['data']);
    }

    /**
     * Get availabilityGroup.
     *
     * @return \MerchantAPI\Model\AvailabilityGroup|null
     */
    public function getAvailabilityGroup() : ?AvailabilityGroup
    {
        return $this->availabilityGroup;
    }
}