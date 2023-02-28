<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\MultiCall;

use MerchantAPI\Collection;
use MerchantAPI\RequestInterface;

/**
 * Class MultiCallOperation. Represents a sequence of iterations for the same request type.
 *
 * @package MerchantAPI
 * @see MultiCallOperationRequest
 */
class MultiCallOperation
{
    /** @var array */
    protected array $sharedData;

    /** @var Collection */
    protected Collection $requests;

    /**
     * MultiCallOperation constructor.
     * @param RequestInterface|array|null
     * @param array $sharedData
     */
    public function __construct($request = null, array $sharedData = [])
    {
        $this->requests = new Collection();

        if ($request instanceof RequestInterface) {
            $this->addRequest($request);
        } else if (is_array($request)) {
            foreach ($request as $r) {
                $this->addRequest($r);
            }
        }

        $this->sharedData = $sharedData;
    }

    /**
     * Get the shared data.
     *
     * @return array
     */
    public function getSharedData() : array
    {
        return $this->sharedData;
    }

    /**
     * Add data to be shared with all iterations.
     *
     * @param string $field
     * @param mixed $value
     * @return $this
     */
    public function addSharedData(string $field, $value) : self
    {
        $this->sharedData[$field] = $value;
        return $this;
    }

    /**
     * Set and overwrite the shared data.
     *
     * @param array $data
     * @return $this
     */
    public function setSharedData(array $data) : self
    {
        $this->sharedData = $data;
        return $this;
    }

    /**
     * Get all request iterations.
     *
     * @return Collection
     */
    public function getRequests() : Collection
    {
        return $this->requests;
    }

    /**
     * Add a request iteration.
     *
     * @param RequestInterface $request
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addRequest(RequestInterface $request) : self
    {
        if ($request instanceof MultiCallRequest) {
            throw new \InvalidArgumentException('Can\'t nest a MultiCallRequest in a MultiCallOperation');
        }

        if ($this->requests->count()) {
            if (get_class($request) !== get_class($this->requests->first())) {
                throw new \InvalidArgumentException(sprintf('Iterations must be of the same request type. Expected %s but got %s',
                    get_class($this->requests->first()), get_class($request)));
            }
        }

        $this->requests->insert($request);

        return $this;
    }

    /**
     * Add an array of requests.
     *
     * @param array $requests
     * @return $this
     */
    public function addRequests(array $requests) : self
    {
        foreach ($requests as $request) {
            $this->addRequest($request);
        }

        return $this;
    }

    /**
     *
     * @param array $requests
     * @return $this
     */
    public function setRequests(array $requests) : self
    {
        $this->requests = new Collection();

        foreach ($requests as $request) {
            $this->addRequest($request);
        }

        return $this;
    }

    /**
     * Reduce the operation to an array.
     *
     * @return array
     */
    public function toArray() : array
    {
        if (!count($this->requests)) {
            return [];
        }

        $data = array_replace($this->sharedData, [
            'Function'   => $this->requests->first()->getFunction(),
            'Iterations' => []
        ]);

        foreach ($this->requests as $i => $request) {
            $data['Iterations'][] = $request->toArray();
        }

        return $data;
    }
}