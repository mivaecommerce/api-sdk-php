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

use MerchantAPI\ListQuery\ListQueryRequest;
use MerchantAPI\Http\HttpResponse;
use MerchantAPI\Model\Changeset;
use MerchantAPI\Model\ChangesetJavaScriptResourceVersion;
use MerchantAPI\BaseClient;

/**
 * Handles API Request ChangesetJavaScriptResourceVersionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/changesetjavascriptresourceversionlist_load_query
 */
class ChangesetJavaScriptResourceVersionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'ChangesetJavaScriptResourceVersionList_Load_Query';

    /** @var array Requests available search fields */
    protected $availableSearchFields = [
        'id',
        'res_id',
        'code',
        'type',
        'is_global',
        'active',
        'file',
        'templ_id',
        'user_id',
        'user_name',
        'source_user_id',
        'source_user_name',
    ];

    /** @var array Requests available sort fields */
    protected $availableSortFields = [
        'id',
        'res_id',
        'code',
        'type',
        'is_global',
        'active',
        'file',
        'templ_id',
        'user_id',
        'user_name',
        'source_user_id',
        'source_user_name',
    ];

    /** @var array Requests available on demand columns */
    protected $availableOnDemandColumns = [
        'source',
    ];

    /** @var int */
    protected $changesetId;

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Changeset
     */
    public function __construct(BaseClient $client = null, Changeset $changeset = null)
    {
        parent::__construct($client);
        if ($changeset) {
            $this->setChangesetId($changeset->getId());
        }
    }

    /**
     * Get Changeset_ID.
     *
     * @return int
     */
    public function getChangesetId()
    {
        return $this->changesetId;
    }

    /**
     * Set Changeset_ID.
     *
     * @param int
     * @return $this
     */
    public function setChangesetId($changesetId)
    {
        $this->changesetId = $changesetId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        $data['Changeset_ID'] = $this->getChangesetId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ChangesetJavaScriptResourceVersionListLoadQuery($this, $httpResponse, $data);
    }
}