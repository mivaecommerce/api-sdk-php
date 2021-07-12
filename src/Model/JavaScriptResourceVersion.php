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
 * Data model for JavaScriptResourceVersion.
 *
 * @package MerchantAPI\Model
 */
class JavaScriptResourceVersion extends \MerchantAPI\Model
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

        $this->setField('attributes', new Collection());
        $this->setField('linkedpages', new Collection());
        $this->setField('linkedresources', new Collection());

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            $attributes = new Collection();

            foreach($data['attributes'] as $e) {
                if ($e instanceof JavaScriptResourceVersionAttribute) {
                    $attributes[] = $e;
                } else if (is_array($e)) {
                    $attributes[] = new JavaScriptResourceVersionAttribute($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceVersionAttribute or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('attributes', $attributes);
        }

        if (isset($data['linkedpages']) && is_array($data['linkedpages'])) {
            $linkedpages = new Collection();

            foreach($data['linkedpages'] as $e) {
                if ($e instanceof Page) {
                    $linkedpages[] = $e;
                } else if (is_array($e)) {
                    $linkedpages[] = new Page($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of Page or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('linkedpages', $linkedpages);
        }

        if (isset($data['linkedresources']) && is_array($data['linkedresources'])) {
            $linkedresources = new Collection();

            foreach($data['linkedresources'] as $e) {
                if ($e instanceof JavaScriptResource) {
                    $linkedresources[] = $e;
                } else if (is_array($e)) {
                    $linkedresources[] = new JavaScriptResource($e);
                } else {
                    throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResource or an array of arrays but got %s',
                        is_object($e) ? get_class($e) : gettype($e)));
                }
            }

            $this->setField('linkedresources', $linkedresources);
        }
    }

    /**
     * Clone.
     *
     * @return void
     */
    public function __clone()
    {
        if (isset($this->data['attributes']) && is_array($this->data['attributes'])) {
            if ($this->data['attributes'] instanceof Collection) {
                $this->data['attributes'] = clone $this->data['attributes'];
            } else {
                foreach($this->data['attributes'] as $i => $e) {
                    if ($e instanceof JavaScriptResourceVersionAttribute) {
                        $this->data['attributes'][$i] = clone $this->data['attributes'][$i];
                    }
                }
            }
        }

        if (isset($this->data['linkedpages']) && is_array($this->data['linkedpages'])) {
            if ($this->data['linkedpages'] instanceof Collection) {
                $this->data['linkedpages'] = clone $this->data['linkedpages'];
            } else {
                foreach($this->data['linkedpages'] as $i => $e) {
                    if ($e instanceof Page) {
                        $this->data['linkedpages'][$i] = clone $this->data['linkedpages'][$i];
                    }
                }
            }
        }

        if (isset($this->data['linkedresources']) && is_array($this->data['linkedresources'])) {
            if ($this->data['linkedresources'] instanceof Collection) {
                $this->data['linkedresources'] = clone $this->data['linkedresources'];
            } else {
                foreach($this->data['linkedresources'] as $i => $e) {
                    if ($e instanceof JavaScriptResource) {
                        $this->data['linkedresources'][$i] = clone $this->data['linkedresources'][$i];
                    }
                }
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
     * Get res_id.
     *
     * @return int
     */
    public function getResourceId()
    {
        return (int) $this->getField('res_id', 0);
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
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getField('type');
    }

    /**
     * Get is_global.
     *
     * @return bool
     */
    public function getIsGlobal()
    {
        return (bool) $this->getField('is_global', false);
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
     * Get file.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->getField('file');
    }

    /**
     * Get branchless_file.
     *
     * @return string
     */
    public function getBranchlessFile()
    {
        return $this->getField('branchless_file');
    }

    /**
     * Get templ_id.
     *
     * @return int
     */
    public function getTemplateId()
    {
        return (int) $this->getField('templ_id', 0);
    }

    /**
     * Get user_id.
     *
     * @return int
     */
    public function getUserId()
    {
        return (int) $this->getField('user_id', 0);
    }

    /**
     * Get user_name.
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->getField('user_name');
    }

    /**
     * Get user_icon.
     *
     * @return string
     */
    public function getUserIcon()
    {
        return $this->getField('user_icon');
    }

    /**
     * Get source_user_id.
     *
     * @return int
     */
    public function getSourceUserId()
    {
        return (int) $this->getField('source_user_id', 0);
    }

    /**
     * Get source_user_name.
     *
     * @return string
     */
    public function getSourceUserName()
    {
        return $this->getField('source_user_name');
    }

    /**
     * Get source_user_icon.
     *
     * @return string
     */
    public function getSourceUserIcon()
    {
        return $this->getField('source_user_icon');
    }

    /**
     * Get source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->getField('source');
    }

    /**
     * Get attributes.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\JavaScriptResourceVersionAttribute[]
     */
    public function getAttributes()
    {
        return $this->getField('attributes', []);
    }

    /**
     * Get linkedpages.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\Page[]
     */
    public function getLinkedPages()
    {
        return $this->getField('linkedpages', []);
    }

    /**
     * Get linkedresources.
     *
     * @return \MerchantAPI\Collection|\MerchantAPI\Model\JavaScriptResource[]
     */
    public function getLinkedResources()
    {
        return $this->getField('linkedresources', []);
    }

    /**
     * Get source_notes.
     *
     * @return string
     */
    public function getSourceNotes()
    {
        return $this->getField('source_notes');
    }
}