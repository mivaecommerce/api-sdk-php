<?php
/*
 * This file is part of the MerchantAPI package.
 *
 * (c) Miva Inc <https://www.miva.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MerchantAPI\Model;

/**
 * Data model for Uri.
 *
 * @package MerchantAPI\Model
 */
class Uri extends \MerchantAPI\Model
{
    /** @var string DESTINATION_TYPE_SCREEN */
    const DESTINATION_TYPE_SCREEN = 'screen';

    /** @var string DESTINATION_TYPE_PAGE */
    const DESTINATION_TYPE_PAGE = 'page';

    /** @var string DESTINATION_TYPE_CATEGORY */
    const DESTINATION_TYPE_CATEGORY = 'category';

    /** @var string DESTINATION_TYPE_PRODUCT */
    const DESTINATION_TYPE_PRODUCT = 'product';

    /** @var string DESTINATION_TYPE_FEED */
    const DESTINATION_TYPE_FEED = 'feed';

    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['store'])) {
            if ($data['store'] instanceof UriDetail) {
                $this->setField('store', $data['store']);
            } else if (is_array($data['store'])) {
                $this->setField('store', new UriDetail($data['store']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected UriDetail or an array but got %s',
                    is_object($data['store']) ?
                        get_class($data['store']) : gettype($data['store'])));
            }
        }

        if (isset($data['product'])) {
            if ($data['product'] instanceof UriDetail) {
                $this->setField('product', $data['product']);
            } else if (is_array($data['product'])) {
                $this->setField('product', new UriDetail($data['product']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected UriDetail or an array but got %s',
                    is_object($data['product']) ?
                        get_class($data['product']) : gettype($data['product'])));
            }
        }

        if (isset($data['category'])) {
            if ($data['category'] instanceof UriDetail) {
                $this->setField('category', $data['category']);
            } else if (is_array($data['category'])) {
                $this->setField('category', new UriDetail($data['category']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected UriDetail or an array but got %s',
                    is_object($data['category']) ?
                        get_class($data['category']) : gettype($data['category'])));
            }
        }

        if (isset($data['page'])) {
            if ($data['page'] instanceof UriDetail) {
                $this->setField('page', $data['page']);
            } else if (is_array($data['page'])) {
                $this->setField('page', new UriDetail($data['page']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected UriDetail or an array but got %s',
                    is_object($data['page']) ?
                        get_class($data['page']) : gettype($data['page'])));
            }
        }

        if (isset($data['feed'])) {
            if ($data['feed'] instanceof UriDetail) {
                $this->setField('feed', $data['feed']);
            } else if (is_array($data['feed'])) {
                $this->setField('feed', new UriDetail($data['feed']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected UriDetail or an array but got %s',
                    is_object($data['feed']) ?
                        get_class($data['feed']) : gettype($data['feed'])));
            }
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($data['store'])) {
            if ($this->data['store'] instanceof UriDetail) {
                $this->data['store'] = clone $this->data['store'];
            }
        }

        if (isset($data['product'])) {
            if ($this->data['product'] instanceof UriDetail) {
                $this->data['product'] = clone $this->data['product'];
            }
        }

        if (isset($data['category'])) {
            if ($this->data['category'] instanceof UriDetail) {
                $this->data['category'] = clone $this->data['category'];
            }
        }

        if (isset($data['page'])) {
            if ($this->data['page'] instanceof UriDetail) {
                $this->data['page'] = clone $this->data['page'];
            }
        }

        if (isset($data['feed'])) {
            if ($this->data['feed'] instanceof UriDetail) {
                $this->data['feed'] = clone $this->data['feed'];
            }
        }
    }

    /**
     * Get id.
     *
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get uri.
     *
     * @return ?string
     */
    public function getUri() : ?string
    {
        return $this->getField('uri');
    }

    /**
     * Get store_id.
     *
     * @return ?int
     */
    public function getStoreId() : ?int
    {
        return $this->getField('store_id');
    }

    /**
     * Get screen.
     *
     * @return ?string
     */
    public function getScreen() : ?string
    {
        return $this->getField('screen');
    }

    /**
     * Get page_id.
     *
     * @return ?int
     */
    public function getPageId() : ?int
    {
        return $this->getField('page_id');
    }

    /**
     * Get cat_id.
     *
     * @return ?int
     */
    public function getCategoryId() : ?int
    {
        return $this->getField('cat_id');
    }

    /**
     * Get product_id.
     *
     * @return ?int
     */
    public function getProductId() : ?int
    {
        return $this->getField('product_id');
    }

    /**
     * Get feed_id.
     *
     * @return ?int
     */
    public function getFeedId() : ?int
    {
        return $this->getField('feed_id');
    }

    /**
     * Get canonical.
     *
     * @return ?bool
     */
    public function getCanonical() : ?bool
    {
        return $this->getField('canonical');
    }

    /**
     * Get status.
     *
     * @return ?int
     */
    public function getStatus() : ?int
    {
        return $this->getField('status');
    }

    /**
     * Get store.
     *
     * @return ?\MerchantAPI\Model\UriDetail
     */
    public function getStore() : ?UriDetail
    {
        return $this->getField('store');
    }

    /**
     * Get product.
     *
     * @return ?\MerchantAPI\Model\UriDetail
     */
    public function getProduct() : ?UriDetail
    {
        return $this->getField('product');
    }

    /**
     * Get category.
     *
     * @return ?\MerchantAPI\Model\UriDetail
     */
    public function getCategory() : ?UriDetail
    {
        return $this->getField('category');
    }

    /**
     * Get page.
     *
     * @return ?\MerchantAPI\Model\UriDetail
     */
    public function getPage() : ?UriDetail
    {
        return $this->getField('page');
    }

    /**
     * Get feed.
     *
     * @return ?\MerchantAPI\Model\UriDetail
     */
    public function getFeed() : ?UriDetail
    {
        return $this->getField('feed');
    }
}