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
 * Data model for Page.
 *
 * @package MerchantAPI\Model
 */
class Page extends \MerchantAPI\Model
{
    /** @var string PAGE_CACHE_TYPE_NEVER */
    const PAGE_CACHE_TYPE_NEVER = 'never';

    /** @var string PAGE_CACHE_TYPE_PROVISIONAL */
    const PAGE_CACHE_TYPE_PROVISIONAL = 'provisional';

    /** @var string PAGE_CACHE_TYPE_ANONEMPTY */
    const PAGE_CACHE_TYPE_ANONEMPTY = 'anonempty';

    /** @var string PAGE_CACHE_TYPE_ALLEMPTY */
    const PAGE_CACHE_TYPE_ALLEMPTY = 'allempty';

    /** @var string PAGE_CACHE_TYPE_ALWAYS */
    const PAGE_CACHE_TYPE_ALWAYS = 'always';

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

        if (isset($data['settings'])) {
            if ($data['settings'] instanceof VersionSettings) {
                $this->setField('settings', $data['settings']);
            } else {
                $this->setField('settings', new VersionSettings($data['settings']));
            }
        }

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
        if (isset($data['settings'])) {
            if ($this->data['settings'] instanceof VersionSettings) {
                $this->data['settings'] = clone $this->data['settings'];
            }
        }

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
     * Get secure.
     *
     * @return ?bool
     */
    public function getSecure() : ?bool
    {
        return $this->getField('secure');
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
     * Get title.
     *
     * @return ?string
     */
    public function getTitle() : ?string
    {
        return $this->getField('title');
    }

    /**
     * Get ui_id.
     *
     * @return ?int
     */
    public function getUiId() : ?int
    {
        return $this->getField('ui_id');
    }

    /**
     * Get templ_id.
     *
     * @return ?int
     */
    public function getTemplateId() : ?int
    {
        return $this->getField('templ_id');
    }

    /**
     * Get admin.
     *
     * @return ?bool
     */
    public function getAdmin() : ?bool
    {
        return $this->getField('admin');
    }

    /**
     * Get layout.
     *
     * @return ?bool
     */
    public function getLayout() : ?bool
    {
        return $this->getField('layout');
    }

    /**
     * Get notes.
     *
     * @return ?string
     */
    public function getNotes() : ?string
    {
        return $this->getField('notes');
    }

    /**
     * Get source.
     *
     * @return ?string
     */
    public function getSource() : ?string
    {
        return $this->getField('source');
    }

    /**
     * Get settings.
     *
     * @return ?\MerchantAPI\Model\VersionSettings
     */
    public function getSettings() : ?VersionSettings
    {
        return $this->getField('settings');
    }

    /**
     * Get cache.
     *
     * @return ?string
     */
    public function getCache() : ?string
    {
        return $this->getField('cache');
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
     * Get uris.
     *
     * @return \MerchantAPI\Collection
     */
    public function getUris() : ?Collection
    {
        return $this->getField('uris');
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

    /**
     * Get version_id.
     *
     * @return ?int
     */
    public function getVersionId() : ?int
    {
        return $this->getField('version_id');
    }
}