<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Request;

use MerchantAPI\Request;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\MerchantVersion;
use MerchantAPI\BaseClient;

/**
 * Handles API Request MivaMerchantVersion.
 *
 * Scope: Domain
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/mivamerchantversion
 */
class MivaMerchantVersion extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_DOMAIN;

    /** @var string The API function name */
    protected $function = 'MivaMerchantVersion';

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\MivaMerchantVersion($this, $httpResponse, $data);
    }
}