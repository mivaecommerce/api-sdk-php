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
use MerchantAPI\Model\Page;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for Page_Copy.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/page_copy
 */
class PageCopy extends Response
{
    /** @var ?\MerchantAPI\Model\Page */
    protected ?Page $page = null;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->page = new Page($this->data['data']);
    }

    /**
     * Get page.
     *
     * @return \MerchantAPI\Model\Page|null
     */
    public function getPage() : ?Page
    {
        return $this->page;
    }
}