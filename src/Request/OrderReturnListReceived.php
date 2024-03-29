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
use MerchantAPI\Model\ReceivedReturn;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

/**
 * Handles API Request OrderReturnList_Received.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/orderreturnlist_received
 */
class OrderReturnListReceived extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'OrderReturnList_Received';

    /** @var \MerchantAPI\Collection */
    protected Collection $returns;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     */
    public function __construct(?BaseClient $client = null)
    {
        parent::__construct($client);
        $this->returns = new \MerchantAPI\Collection();
    }

    /**
     * Get Returns.
     *
     * @return \MerchantAPI\Collection
     */
    public function getReturns() : ?Collection
    {
        return $this->returns;
    }

    /**
     * Set Returns.
     *
     * @param \MerchantAPI\Collection|array $returns
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setReturns($returns) : self
    {
        if (!is_array($returns) && !$returns instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($returns) ? get_class($returns) : gettype($returns)));
        }

        foreach ($returns as &$model) {
            if (is_array($model)) {
                $model = new ReceivedReturn($model);
            } else if (!$model instanceof ReceivedReturn) {
                throw new \InvalidArgumentException(sprintf('Expected array of ReceivedReturn or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->returns = new Collection($returns);

        return $this;
    }

    /**
     * Add Returns.
     *
     * @param \MerchantAPI\Model\ReceivedReturn
     * @return $this
     */
    public function addReceivedReturn(ReceivedReturn $model) : self
    {
        $this->returns[] = $model;
        return $this;
    }

    /**
     * Add many ReceivedReturn.
     *
     * @param (\MerchantAPI\Model\ReceivedReturn|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addReturns(array $returns) : self
    {
        foreach ($returns as $e) {
            if (is_array($e)) {
                $this->returns[] = new ReceivedReturn($e);
            } else if ($e instanceof ReceivedReturn) {
                $this->returns[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ReceivedReturn or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        if (count($this->getReturns())) {
            $data['Returns'] = [];

            foreach ($this->getReturns() as $i => $receivedReturn) {
                $data['Returns'][] = $receivedReturn->getData();
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\OrderReturnListReceived($this, $httpResponse, $data);
    }
}