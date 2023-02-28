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
 * Data model for ResourceGroupChange.
 *
 * @package MerchantAPI\Model
 */
class ResourceGroupChange extends \MerchantAPI\Model
{
    /**
     * Get ResourceGroup_ID.
     *
     * @return ?int
     */
    public function getResourceGroupId() : ?int
    {
        return $this->getField('ResourceGroup_ID');
    }

    /**
     * Get ResourceGroup_Code.
     *
     * @return ?string
     */
    public function getResourceGroupCode() : ?string
    {
        return $this->getField('ResourceGroup_Code');
    }

    /**
     * Get LinkedCSSResources.
     *
     * @return ?array
     */
    public function getLinkedCSSResources() : ?array
    {
        return $this->getField('LinkedCSSResources');
    }

    /**
     * Get LinkedJavaScriptResources.
     *
     * @return ?array
     */
    public function getLinkedJavaScriptResources() : ?array
    {
        return $this->getField('LinkedJavaScriptResources');
    }

    /**
     * Set ResourceGroup_ID.
     *
     * @param ?int $resourceGroupId
     * @return $this
     */
    public function setResourceGroupId(?int $resourceGroupId) : self
    {
        return $this->setField('ResourceGroup_ID', $resourceGroupId);
    }

    /**
     * Set ResourceGroup_Code.
     *
     * @param ?string $resourceGroupCode
     * @return $this
     */
    public function setResourceGroupCode(?string $resourceGroupCode) : self
    {
        return $this->setField('ResourceGroup_Code', $resourceGroupCode);
    }

    /**
     * Set LinkedCSSResources.
     *
     * @param ?array $linkedCSSResources
     * @return $this
     */
    public function setLinkedCSSResources(?array $linkedCSSResources) : self
    {
        return $this->setField('LinkedCSSResources', $linkedCSSResources);
    }

    /**
     * Set LinkedJavaScriptResources.
     *
     * @param ?array $linkedJavaScriptResources
     * @return $this
     */
    public function setLinkedJavaScriptResources(?array $linkedJavaScriptResources) : self
    {
        return $this->setField('LinkedJavaScriptResources', $linkedJavaScriptResources);
    }
}