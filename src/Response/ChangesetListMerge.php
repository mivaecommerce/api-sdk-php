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
use MerchantAPI\Model\Changeset;
use MerchantAPI\RequestInterface;
use MerchantAPI\Http\HttpResponse;

/**
 * API Response for ChangesetList_Merge.
 *
 * @package MerchantAPI\Response
 * @see https://docs.miva.com/json-api/functions/changesetlist_merge
 */
class ChangesetListMerge extends Response
{
    /** @var \MerchantAPI\Model\Changeset */
    protected $changeset;

    /**
     * @inheritDoc
     */
    public function __construct(RequestInterface $request, HttpResponse $response, array $data)
    {
        parent::__construct($request, $response, $data);

        if (!$this->isSuccess()) {
            return;
        }

        $this->changeset = new Changeset($this->data['data']);
    }

    /**
     * Get changeset.
     *
     * @return \MerchantAPI\Model\Changeset|null
     */
    public function getChangeset()
    {
        return $this->changeset;
    }
}