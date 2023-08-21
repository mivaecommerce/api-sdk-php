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

use MerchantAPI\Collection;

/**
 * Data model for Category.
 *
 * @package MerchantAPI\Model
 */
class Category extends \MerchantAPI\Model
{
    /**
     * Constructor.
     *
     * @param array $data
     * @throws \InvalidArgumentException
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->setField('uris', new Collection());

        if (isset($data['uris']) && is_array($data['uris'])) {
            $uris = new Collection();

            foreach($data['uris'] as $e) {
                if ($e instanceof Uri) {
                    $uris[] = $e;
                } else if (is_array($e)) {
                    $uris[] = new Uri($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of Uri or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('uris', $uris);
        }

        if (isset($data['CustomField_Values'])) {
            if ($data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->setField('CustomField_Values', $data['CustomField_Values']);
            } else if (is_array($data['CustomField_Values'])) {
                $this->setField('CustomField_Values', new CustomFieldValues($data['CustomField_Values']));
            } else {
                throw new \InvalidArgumentException(sprintf('Expected CustomFieldValues or an array but got %s',
                    is_object($data['CustomField_Values']) ?
                        get_class($data['CustomField_Values']) : gettype($data['CustomField_Values'])));
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
        if (isset($this->data['uris']) && is_array($this->data['uris'])) {
            if ($this->data['uris'] instanceof Collection) {
                $this->data['uris'] = clone $this->data['uris'];
            } else {
                foreach($this->data['uris'] as $i => $e) {
                    if ($e instanceof Uri) {
                        $this->data['uris'][$i] = clone $this->data['uris'][$i];
                    }
                }
            }
        }

        if (isset($data['CustomField_Values'])) {
            if ($this->data['CustomField_Values'] instanceof CustomFieldValues) {
                $this->data['CustomField_Values'] = clone $this->data['CustomField_Values'];
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
     * Get parent_id.
     *
     * @return ?int
     */
    public function getParentId() : ?int
    {
        return $this->getField('parent_id');
    }

    /**
     * Get agrpcount.
     *
     * @return ?int
     */
    public function getAvailabilityGroupCount() : ?int
    {
        return $this->getField('agrpcount');
    }

    /**
     * Get depth.
     *
     * @return ?int
     */
    public function getDepth() : ?int
    {
        return $this->getField('depth');
    }

    /**
     * Get disp_order.
     *
     * @return ?int
     */
    public function getDisplayOrder() : ?int
    {
        return $this->getField('disp_order');
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
     * Get code.
     *
     * @return ?string
     */
    public function getCode() : ?string
    {
        return $this->getField('code');
    }

    /**
     * Get name.
     *
     * @return ?string
     */
    public function getName() : ?string
    {
        return $this->getField('name');
    }

    /**
     * Get page_title.
     *
     * @return ?string
     */
    public function getPageTitle() : ?string
    {
        return $this->getField('page_title');
    }

    /**
     * Get active.
     *
     * @return ?bool
     */
    public function getActive() : ?bool
    {
        return $this->getField('active');
    }

    /**
     * Get dt_created.
     *
     * @return ?int
     */
    public function getDateTimeCreated() : ?int
    {
        return $this->getTimestampField('dt_created');
    }

    /**
     * Get dt_updated.
     *
     * @return ?int
     */
    public function getDateTimeUpdated() : ?int
    {
        return $this->getTimestampField('dt_updated');
    }

    /**
     * Get page_code.
     *
     * @return ?string
     */
    public function getPageCode() : ?string
    {
        return $this->getField('page_code');
    }

    /**
     * Get parent_category.
     *
     * @return ?string
     */
    public function getParentCategory() : ?string
    {
        return $this->getField('parent_category');
    }

    /**
     * Get uris.
     *
     * @return \MerchantAPI\Collection
     */
    public function getUris() : ?Collection
    {
        return $this->getField('uris');
    }

    /**
     * Get url.
     *
     * @return ?string
     */
    public function getUrl() : ?string
    {
        return $this->getField('url');
    }

    /**
     * Get CustomField_Values.
     *
     * @return ?\MerchantAPI\Model\CustomFieldValues
     */
    public function getCustomFieldValues() : ?CustomFieldValues
    {
        return $this->getField('CustomField_Values');
    }
}