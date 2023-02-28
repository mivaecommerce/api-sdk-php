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

use MerchantAPI\ListQuery\ListQueryResponse;
use MerchantAPI\Model\ImageType;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Collection;

/**
 * API Response for ImageTypeList_Load_Query.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/imagetypelist_load_query
 */
class ImageTypeListLoadQuery extends ListQueryResponse
{
    /** @var \MerchantAPI\Collection */
    protected Collection $imageTypes;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);
        $this->imageTypes = new Collection();

        if (!$this->isSuccess()) {
            return;
        }

        if (isset($data['data']['data'])) {
            foreach ($data['data']['data'] as $result) {
              $this->imageTypes[] = new ImageType($result);
            }
        }
    }

    /**
     * Get imageTypes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getImageTypes() : Collection
    {
        return $this->imageTypes;
    }
}