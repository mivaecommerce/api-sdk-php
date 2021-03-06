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
     * @return int
     */
    public function getId()
    {
        return (int) $this->getField('id', 0);
    }

    /**
     * Get parent_id.
     *
     * @return int
     */
    public function getParentId()
    {
        return (int) $this->getField('parent_id', 0);
    }

    /**
     * Get agrpcount.
     *
     * @return int
     */
    public function getAvailabilityGroupCount()
    {
        return (int) $this->getField('agrpcount', 0);
    }

    /**
     * Get depth.
     *
     * @return int
     */
    public function getDepth()
    {
        return (int) $this->getField('depth', 0);
    }

    /**
     * Get disp_order.
     *
     * @return int
     */
    public function getDisplayOrder()
    {
        return (int) $this->getField('disp_order', 0);
    }

    /**
     * Get page_id.
     *
     * @return int
     */
    public function getPageId()
    {
        return (int) $this->getField('page_id', 0);
    }

    /**
     * Get code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getField('code');
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getField('name');
    }

    /**
     * Get page_title.
     *
     * @return string
     */
    public function getPageTitle()
    {
        return $this->getField('page_title');
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return (bool) $this->getField('active', false);
    }

    /**
     * Get dt_created.
     *
     * @return int
     */
    public function getDateTimeCreated()
    {
        return (int) $this->getField('dt_created', 0);
    }

    /**
     * Get dt_updated.
     *
     * @return int
     */
    public function getDateTimeUpdated()
    {
        return (int) $this->getField('dt_updated', 0);
    }

    /**
     * Get page_code.
     *
     * @return string
     */
    public function getPageCode()
    {
        return $this->getField('page_code');
    }

    /**
     * Get parent_category.
     *
     * @return string
     */
    public function getParentCategory()
    {
        return $this->getField('parent_category');
    }

    /**
     * Get uris.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\Uri[]
     */
    public function getUris()
    {
        return $this->getField('uris', []);
    }

    /**
     * Get CustomField_Values.
     *
     * @return \MerchantAPI\Model\CustomFieldValues|null
     */
    public function getCustomFieldValues()
    {
        return $this->getField('CustomField_Values', null);
    }
}