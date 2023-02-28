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
use MerchantAPI\Model\ChangesetCSSResourceVersion;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ChangesetCSSResourceVersionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/changesetcssresourceversionlist_load_query
 */
class ChangesetCSSResourceVersionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ChangesetCSSResourceVersionList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
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
    protected array $availableSortFields = [
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
    protected array $availableOnDemandColumns = [
        'source',
        'source_notes',
    ];

    /** @var ?int */
    protected ?int $changesetId = null;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Changeset $changeset
     */
    public function __construct(?BaseClient $client = null, ?Changeset $changeset = null)
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
    public function getChangesetId() : ?int
    {
        return $this->changesetId;
    }

    /**
     * Set Changeset_ID.
     *
     * @param ?int $changesetId
     * @return $this
     */
    public function setChangesetId(?int $changesetId) : self
    {
        $this->changesetId = $changesetId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Changeset_ID'] = $this->getChangesetId();

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ChangesetCSSResourceVersionListLoadQuery($this, $httpResponse, $data);
    }
}