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
use MerchantAPI\Model\CopyPageRule;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;

/**
 * Handles API Request CopyPageRules_Insert.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/copypagerules_insert
 */
class CopyPageRulesInsert extends Request
{
    /** @var string The request scope */
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'CopyPageRules_Insert';

    /** @var ?string */
    protected ?string $name = null;

    /** @var ?bool */
    protected ?bool $secure = null;

    /** @var ?bool */
    protected ?bool $title = null;

    /** @var ?bool */
    protected ?bool $template = null;

    /** @var ?bool */
    protected ?bool $items = null;

    /** @var ?bool */
    protected ?bool $public = null;

    /** @var ?string */
    protected ?string $settings = null;

    /** @var ?bool */
    protected ?bool $javaScriptResourceAssignments = null;

    /** @var ?bool */
    protected ?bool $CSSResourceAssignments = null;

    /** @var ?bool */
    protected ?bool $cacheSettings = null;

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * Get Secure.
     *
     * @return bool
     */
    public function getSecure() : ?bool
    {
        return $this->secure;
    }

    /**
     * Get Title.
     *
     * @return bool
     */
    public function getTitle() : ?bool
    {
        return $this->title;
    }

    /**
     * Get Template.
     *
     * @return bool
     */
    public function getTemplate() : ?bool
    {
        return $this->template;
    }

    /**
     * Get Items.
     *
     * @return bool
     */
    public function getItems() : ?bool
    {
        return $this->items;
    }

    /**
     * Get Public.
     *
     * @return bool
     */
    public function getPublic() : ?bool
    {
        return $this->public;
    }

    /**
     * Get Settings.
     *
     * @return string
     */
    public function getSettings() : ?string
    {
        return $this->settings;
    }

    /**
     * Get JavaScriptResourceAssignments.
     *
     * @return bool
     */
    public function getJavaScriptResourceAssignments() : ?bool
    {
        return $this->javaScriptResourceAssignments;
    }

    /**
     * Get CSSResourceAssignments.
     *
     * @return bool
     */
    public function getCSSResourceAssignments() : ?bool
    {
        return $this->CSSResourceAssignments;
    }

    /**
     * Get CacheSettings.
     *
     * @return bool
     */
    public function getCacheSettings() : ?bool
    {
        return $this->cacheSettings;
    }

    /**
     * Set Name.
     *
     * @param ?string $name
     * @return $this
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set Secure.
     *
     * @param ?bool $secure
     * @return $this
     */
    public function setSecure(?bool $secure) : self
    {
        $this->secure = $secure;

        return $this;
    }

    /**
     * Set Title.
     *
     * @param ?bool $title
     * @return $this
     */
    public function setTitle(?bool $title) : self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set Template.
     *
     * @param ?bool $template
     * @return $this
     */
    public function setTemplate(?bool $template) : self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Set Items.
     *
     * @param ?bool $items
     * @return $this
     */
    public function setItems(?bool $items) : self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Set Public.
     *
     * @param ?bool $public
     * @return $this
     */
    public function setPublic(?bool $public) : self
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Set Settings.
     *
     * @param ?string $settings
     * @return $this
     */
    public function setSettings(?string $settings) : self
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Set JavaScriptResourceAssignments.
     *
     * @param ?bool $javaScriptResourceAssignments
     * @return $this
     */
    public function setJavaScriptResourceAssignments(?bool $javaScriptResourceAssignments) : self
    {
        $this->javaScriptResourceAssignments = $javaScriptResourceAssignments;

        return $this;
    }

    /**
     * Set CSSResourceAssignments.
     *
     * @param ?bool $CSSResourceAssignments
     * @return $this
     */
    public function setCSSResourceAssignments(?bool $CSSResourceAssignments) : self
    {
        $this->CSSResourceAssignments = $CSSResourceAssignments;

        return $this;
    }

    /**
     * Set CacheSettings.
     *
     * @param ?bool $cacheSettings
     * @return $this
     */
    public function setCacheSettings(?bool $cacheSettings) : self
    {
        $this->cacheSettings = $cacheSettings;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        $data = parent::toArray();

        $data['Name'] = $this->getName();

        if (!is_null($this->getSecure())) {
            $data['Secure'] = $this->getSecure();
        }

        if (!is_null($this->getTitle())) {
            $data['Title'] = $this->getTitle();
        }

        if (!is_null($this->getTemplate())) {
            $data['Template'] = $this->getTemplate();
        }

        if (!is_null($this->getItems())) {
            $data['Items'] = $this->getItems();
        }

        if (!is_null($this->getPublic())) {
            $data['Public'] = $this->getPublic();
        }

        if (!is_null($this->getSettings())) {
            $data['Settings'] = $this->getSettings();
        }

        if (!is_null($this->getJavaScriptResourceAssignments())) {
            $data['JavaScriptResourceAssignments'] = $this->getJavaScriptResourceAssignments();
        }

        if (!is_null($this->getCSSResourceAssignments())) {
            $data['CSSResourceAssignments'] = $this->getCSSResourceAssignments();
        }

        if (!is_null($this->getCacheSettings())) {
            $data['CacheSettings'] = $this->getCacheSettings();
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\CopyPageRulesInsert($this, $httpResponse, $data);
    }
}