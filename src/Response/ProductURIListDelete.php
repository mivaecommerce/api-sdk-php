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
use MerchantAPI\Collection;

/**
 * API Response for ProductURIList_Delete.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/producturilist_delete
 */
class ProductURIListDelete extends Response
{
    /** @var \MerchantAPI\Collection */
    protected Collection $uris;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->uris = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data'])) {
            foreach ($data['data'] as $result) {
              $this->uris[] = new Uri($result);
            }
        }
    }

    /**
     * Get uris.
     *
     * @return \MerchantAPI\Collection
     */
    public function getUris() : Collection
    {
        return $this->uris;
    }
}