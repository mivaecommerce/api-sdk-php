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
use MerchantAPI\Model\Uri;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for PageURI_Insert.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/pageuri_insert
 */
class PageURIInsert extends Response
{
    /** @var ?\MerchantAPI\Model\Uri */
    protected ?Uri $uri = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->uri = new Uri($this->data['data']);
    }

    /**
     * Get uri.
     *
     * @return \MerchantAPI\Model\Uri|null
     */
    public function getUri() : ?Uri
    {
        return $this->uri;
    }
}