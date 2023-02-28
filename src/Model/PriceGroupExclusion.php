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
     * @return ?int
     */
    public function getId() : ?int
    {
        return $this->getField('id');
    }

    /**
     * Get scope.
     *
     * @return ?string
     */
    public function getScope() : ?string
    {
        return $this->getField('scope');
    }

    /**
     * Set id.
     *
     * @param ?int $id
     * @return $this
     */
    public function setId(?int $id) : self
    {
        return $this->setField('id', $id);
    }

    /**
     * Set scope.
     *
     * @param ?string $scope
     * @return $this
     */
    public function setScope(?string $scope) : self
    {
        return $this->setField('scope', $scope);
    }
}