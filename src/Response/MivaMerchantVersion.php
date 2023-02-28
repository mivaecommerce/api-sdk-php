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
use MerchantAPI\Model\MerchantVersion;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for MivaMerchantVersion.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/mivamerchantversion
 */
class MivaMerchantVersion extends Response
{
    /** @var ?\MerchantAPI\Model\MerchantVersion */
    protected ?MerchantVersion $merchantVersion = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->merchantVersion = new MerchantVersion($this->data['data']);
    }

    /**
     * Get merchantVersion.
     *
     * @return \MerchantAPI\Model\MerchantVersion|null
     */
    public function getMerchantVersion() : ?MerchantVersion
    {
        return $this->merchantVersion;
    }
}