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
     * @return int
     */
    public function getResourceGroupId()
    {
        return (int) $this->getField('ResourceGroup_ID', 0);
    }

    /**
     * Get ResourceGroup_Code.
     *
     * @return string
     */
    public function getResourceGroupCode()
    {
        return $this->getField('ResourceGroup_Code');
    }

    /**
     * Get LinkedCSSResources.
     *
     * @return array
     */
    public function getLinkedCSSResources()
    {
        return $this->getField('LinkedCSSResources', []);
    }

    /**
     * Get LinkedJavaScriptResources.
     *
     * @return array
     */
    public function getLinkedJavaScriptResources()
    {
        return $this->getField('LinkedJavaScriptResources', []);
    }

    /**
     * Set ResourceGroup_ID.
     *
     * @param int
     * @return $this
     */
    public function setResourceGroupId($resourceGroupId)
    {
        return $this->setField('ResourceGroup_ID', $resourceGroupId);
    }

    /**
     * Set ResourceGroup_Code.
     *
     * @param string
     * @return $this
     */
    public function setResourceGroupCode($resourceGroupCode)
    {
        return $this->setField('ResourceGroup_Code', $resourceGroupCode);
    }

    /**
     * Set LinkedCSSResources.
     *
     * @param array
     * @return $this
     */
    public function setLinkedCSSResources(array $linkedCSSResources)
    {
        return $this->setField('LinkedCSSResources', $linkedCSSResources);
    }

    /**
     * Set LinkedJavaScriptResources.
     *
     * @param array
     * @return $this
     */
    public function setLinkedJavaScriptResources(array $linkedJavaScriptResources)
    {
        return $this->setField('LinkedJavaScriptResources', $linkedJavaScriptResources);
    }
}