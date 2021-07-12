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
 * Data model for PriceGroupExclusion.
 *
 * @package MerchantAPI\Model
 */
class PriceGroupExclusion extends \MerchantAPI\Model
{
    /** @var string EXCLUSION_SCOPE_BASKET */
    const EXCLUSION_SCOPE_BASKET = 'basket';

    /** @var string EXCLUSION_SCOPE_GROUP */
    const EXCLUSION_SCOPE_GROUP = 'group';

    /** @var string EXCLUSION_SCOPE_ITEM */
    const EXCLUSION_SCOPE_ITEM = 'item';

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
     * Get scope.
     *
     * @return string
     */
    public function getScope()
    {
        return $this->getField('scope');
    }

    /**
     * Set id.
     *
     * @param int
     * @return $this
     */
    public function setId($id)
    {
        return $this->setField('id', $id);
    }

    /**
     * Set scope.
     *
     * @param string
     * @return $this
     */
    public function setScope($scope)
    {
        return $this->setField('scope', $scope);
    }
}