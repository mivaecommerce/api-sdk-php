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
use MerchantAPI\Model\ChangesetTemplateVersion;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request ChangesetTemplateVersionList_Load_Query.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/changesettemplateversionlist_load_query
 */
class ChangesetTemplateVersionListLoadQuery extends ListQueryRequest
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'ChangesetTemplateVersionList_Load_Query';

    /** @var array Requests available search fields */
    protected array $availableSearchFields = [
        'id',
        'templ_id',
        'parent_id',
        'item_id',
        'prop_id',
        'sync',
        'filename',
        'dtstamp',
        'user_id',
        'user_name',
    ];

    /** @var array Requests available sort fields */
    protected array $availableSortFields = [
        'id',
        'templ_id',
        'parent_id',
        'item_id',
        'prop_id',
        'sync',
        'filename',
        'dtstamp',
        'user_id',
        'user_name',
    ];

    /** @var array Requests available on demand columns */
    protected array $availableOnDemandColumns = [
        'notes',
        'source',
        'settings',
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
            if ($changeset->getId()) {
                $this->setChangesetId($changeset->getId());
            }
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

        if ($this->getChangesetId()) {
            $data['Changeset_ID'] = $this->getChangesetId();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ChangesetTemplateVersionListLoadQuery($this, $httpResponse, $data);
    }
}