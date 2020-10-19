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
use MerchantAPI\Model\CustomerPaymentCard;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for CustomerPaymentCard_Register.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/customerpaymentcard_register
 */
class CustomerPaymentCardRegister extends Response
{
    /** @var \MerchantAPI\Model\CustomerPaymentCard */
    protected $customerPaymentCard;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->customerPaymentCard = new CustomerPaymentCard($this->data['data']);
    }

    /**
     * Get customerPaymentCard.
     *
     * @return \MerchantAPI\Model\CustomerPaymentCard|null
     */
    public function getCustomerPaymentCard()
    {
        return $this->customerPaymentCard;
    }
}