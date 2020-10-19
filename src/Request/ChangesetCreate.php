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
use MerchantAPI\Model\TemplateChange;
use MerchantAPI\Model\ResourceGroupChange;
use MerchantAPI\Model\CSSResourceChange;
use MerchantAPI\Model\JavaScriptResourceChange;
use MerchantAPI\Model\PropertyChange;
use MerchantAPI\Model\Branch;
use MerchantAPI\Model\Changeset;
use MerchantAPI\BaseClient;

/**
 * Handles API Request Changeset_Create.
 *
 * Scope: Store
 *
 * @package MerchantAPI\Request
 * @see https://docs.miva.com/json-api/functions/changeset_create
 */
class ChangesetCreate extends Request
{
    /** @var string The request scope */
    protected $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected $function = 'Changeset_Create';

    /** @var int */
    protected $branchId;

    /** @var string */
    protected $branchName;

    /** @var string */
    protected $editBranch;

    /** @var string */
    protected $notes;

    /** @var string */
    protected $tags;

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\TemplateChange[] */
    protected $templateChanges = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\ResourceGroupChange[] */
    protected $resourceGroupChanges = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\CSSResourceChange[] */
    protected $CSSResourceChanges = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\JavaScriptResourceChange[] */
    protected $javaScriptResourceChanges = [];

    /** @var \MerchantAPI\Collection|\MerchantAPI\Model\PropertyChange[] */
    protected $propertyChanges = [];

    /**
     * Constructor.
     *
     * @param \MerchantAPI\Model\Branch
     */
    public function __construct(BaseClient $client = null, Branch $branch = null)
    {
        parent::__construct($client);
        $this->templateChanges = new \MerchantAPI\Collection();
        $this->resourceGroupChanges = new \MerchantAPI\Collection();
        $this->CSSResourceChanges = new \MerchantAPI\Collection();
        $this->javaScriptResourceChanges = new \MerchantAPI\Collection();
        $this->propertyChanges = new \MerchantAPI\Collection();

        if ($branch) {
            if ($branch->getId()) {
                $this->setBranchId($branch->getId());
            }

            $this->setBranchName($branch->getName());
        }
    }

    /**
     * Get Branch_ID.
     *
     * @return int
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * Get Branch_Name.
     *
     * @return string
     */
    public function getBranchName()
    {
        return $this->branchName;
    }

    /**
     * Get Edit_Branch.
     *
     * @return string
     */
    public function getEditBranch()
    {
        return $this->editBranch;
    }

    /**
     * Get Notes.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get Tags.
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Get Template_Changes.
     *
     * @return \MerchantAPI\Model\TemplateChange[]
     */
    public function getTemplateChanges()
    {
        return $this->templateChanges;
    }

    /**
     * Get ResourceGroup_Changes.
     *
     * @return \MerchantAPI\Model\ResourceGroupChange[]
     */
    public function getResourceGroupChanges()
    {
        return $this->resourceGroupChanges;
    }

    /**
     * Get CSSResource_Changes.
     *
     * @return \MerchantAPI\Model\CSSResourceChange[]
     */
    public function getCSSResourceChanges()
    {
        return $this->CSSResourceChanges;
    }

    /**
     * Get JavaScriptResource_Changes.
     *
     * @return \MerchantAPI\Model\JavaScriptResourceChange[]
     */
    public function getJavaScriptResourceChanges()
    {
        return $this->javaScriptResourceChanges;
    }

    /**
     * Get Property_Changes.
     *
     * @return \MerchantAPI\Model\PropertyChange[]
     */
    public function getPropertyChanges()
    {
        return $this->propertyChanges;
    }

    /**
     * Set Branch_ID.
     *
     * @param int
     * @return $this
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;

        return $this;
    }

    /**
     * Set Branch_Name.
     *
     * @param string
     * @return $this
     */
    public function setBranchName($branchName)
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * Set Edit_Branch.
     *
     * @param string
     * @return $this
     */
    public function setEditBranch($editBranch)
    {
        $this->editBranch = $editBranch;

        return $this;
    }

    /**
     * Set Notes.
     *
     * @param string
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Set Tags.
     *
     * @param string
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Set Template_Changes.
     *
     * @param (\MerchantAPI\Model\TemplateChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setTemplateChanges(array $templateChanges)
    {
        foreach ($templateChanges as &$model) {
            if (is_array($model)) {
                $model = new TemplateChange($model);
            } else if (!$model instanceof TemplateChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of TemplateChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->templateChanges = new \MerchantAPI\Collection($templateChanges);

        return $this;
    }

    /**
     * Set ResourceGroup_Changes.
     *
     * @param (\MerchantAPI\Model\ResourceGroupChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setResourceGroupChanges(array $resourceGroupChanges)
    {
        foreach ($resourceGroupChanges as &$model) {
            if (is_array($model)) {
                $model = new ResourceGroupChange($model);
            } else if (!$model instanceof ResourceGroupChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of ResourceGroupChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->resourceGroupChanges = new \MerchantAPI\Collection($resourceGroupChanges);

        return $this;
    }

    /**
     * Set CSSResource_Changes.
     *
     * @param (\MerchantAPI\Model\CSSResourceChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCSSResourceChanges(array $CSSResourceChanges)
    {
        foreach ($CSSResourceChanges as &$model) {
            if (is_array($model)) {
                $model = new CSSResourceChange($model);
            } else if (!$model instanceof CSSResourceChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->CSSResourceChanges = new \MerchantAPI\Collection($CSSResourceChanges);

        return $this;
    }

    /**
     * Set JavaScriptResource_Changes.
     *
     * @param (\MerchantAPI\Model\JavaScriptResourceChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setJavaScriptResourceChanges(array $javaScriptResourceChanges)
    {
        foreach ($javaScriptResourceChanges as &$model) {
            if (is_array($model)) {
                $model = new JavaScriptResourceChange($model);
            } else if (!$model instanceof JavaScriptResourceChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->javaScriptResourceChanges = new \MerchantAPI\Collection($javaScriptResourceChanges);

        return $this;
    }

    /**
     * Set Property_Changes.
     *
     * @param (\MerchantAPI\Model\PropertyChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setPropertyChanges(array $propertyChanges)
    {
        foreach ($propertyChanges as &$model) {
            if (is_array($model)) {
                $model = new PropertyChange($model);
            } else if (!$model instanceof PropertyChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of PropertyChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->propertyChanges = new \MerchantAPI\Collection($propertyChanges);

        return $this;
    }

    /**
     * Add Template_Changes.
     *
     * @param \MerchantAPI\Model\TemplateChange
     *
     * @return $this
     */
    public function addTemplateChange(TemplateChange $model)
    {
        $this->templateChanges[] = $model;
        return $this;
    }

    /**
     * Add many TemplateChange.
     *
     * @param (\MerchantAPI\Model\TemplateChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addTemplateChanges(array $templateChanges)
    {
        foreach ($templateChanges as $e) {
            if (is_array($e)) {
                $this->templateChanges[] = new TemplateChange($e);
            } else if ($e instanceof TemplateChange) {
                $this->templateChanges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of TemplateChange or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add ResourceGroup_Changes.
     *
     * @param \MerchantAPI\Model\ResourceGroupChange
     *
     * @return $this
     */
    public function addResourceGroupChange(ResourceGroupChange $model)
    {
        $this->resourceGroupChanges[] = $model;
        return $this;
    }

    /**
     * Add many ResourceGroupChange.
     *
     * @param (\MerchantAPI\Model\ResourceGroupChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addResourceGroupChanges(array $resourceGroupChanges)
    {
        foreach ($resourceGroupChanges as $e) {
            if (is_array($e)) {
                $this->resourceGroupChanges[] = new ResourceGroupChange($e);
            } else if ($e instanceof ResourceGroupChange) {
                $this->resourceGroupChanges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ResourceGroupChange or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add CSSResource_Changes.
     *
     * @param \MerchantAPI\Model\CSSResourceChange
     *
     * @return $this
     */
    public function addCSSResourceChange(CSSResourceChange $model)
    {
        $this->CSSResourceChanges[] = $model;
        return $this;
    }

    /**
     * Add many CSSResourceChange.
     *
     * @param (\MerchantAPI\Model\CSSResourceChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addCSSResourceChanges(array $CSSResourceChanges)
    {
        foreach ($CSSResourceChanges as $e) {
            if (is_array($e)) {
                $this->CSSResourceChanges[] = new CSSResourceChange($e);
            } else if ($e instanceof CSSResourceChange) {
                $this->CSSResourceChanges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceChange or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add JavaScriptResource_Changes.
     *
     * @param \MerchantAPI\Model\JavaScriptResourceChange
     *
     * @return $this
     */
    public function addJavaScriptResourceChange(JavaScriptResourceChange $model)
    {
        $this->javaScriptResourceChanges[] = $model;
        return $this;
    }

    /**
     * Add many JavaScriptResourceChange.
     *
     * @param (\MerchantAPI\Model\JavaScriptResourceChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addJavaScriptResourceChanges(array $javaScriptResourceChanges)
    {
        foreach ($javaScriptResourceChanges as $e) {
            if (is_array($e)) {
                $this->javaScriptResourceChanges[] = new JavaScriptResourceChange($e);
            } else if ($e instanceof JavaScriptResourceChange) {
                $this->javaScriptResourceChanges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceChange or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * Add Property_Changes.
     *
     * @param \MerchantAPI\Model\PropertyChange
     *
     * @return $this
     */
    public function addPropertyChange(PropertyChange $model)
    {
        $this->propertyChanges[] = $model;
        return $this;
    }

    /**
     * Add many PropertyChange.
     *
     * @param (\MerchantAPI\Model\PropertyChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addPropertyChanges(array $propertyChanges)
    {
        foreach ($propertyChanges as $e) {
            if (is_array($e)) {
                $this->propertyChanges[] = new PropertyChange($e);
            } else if ($e instanceof PropertyChange) {
                $this->propertyChanges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of PropertyChange or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $data = parent::toArray();

        if ($this->getBranchId()) {
            $data['Branch_ID'] = $this->getBranchId();
        } else if ($this->getBranchName()) {
            $data['Branch_Name'] = $this->getBranchName();
        } else if ($this->getEditBranch()) {
            $data['Edit_Branch'] = $this->getEditBranch();
        }

        if (!is_null($this->getBranchName())) {
            $data['Branch_Name'] = $this->getBranchName();
        }

        if (!is_null($this->getNotes())) {
            $data['Notes'] = $this->getNotes();
        }

        if (!is_null($this->getTags())) {
            $data['Tags'] = $this->getTags();
        }

        if (count($this->getTemplateChanges())) {
            $data['Template_Changes'] = [];

            foreach ($this->getTemplateChanges() as $i => $templateChange) {
                if ($templateChange->hasData()) {
                    $data['Template_Changes'][] = $templateChange->getData();
                }
            }
        }

        if (count($this->getResourceGroupChanges())) {
            $data['ResourceGroup_Changes'] = [];

            foreach ($this->getResourceGroupChanges() as $i => $resourceGroupChange) {
                if ($resourceGroupChange->hasData()) {
                    $data['ResourceGroup_Changes'][] = $resourceGroupChange->getData();
                }
            }
        }

        if (count($this->getCSSResourceChanges())) {
            $data['CSSResource_Changes'] = [];

            foreach ($this->getCSSResourceChanges() as $i => $CSSResourceChange) {
                if ($CSSResourceChange->hasData()) {
                    $data['CSSResource_Changes'][] = $CSSResourceChange->getData();
                }
            }
        }

        if (count($this->getJavaScriptResourceChanges())) {
            $data['JavaScriptResource_Changes'] = [];

            foreach ($this->getJavaScriptResourceChanges() as $i => $javaScriptResourceChange) {
                if ($javaScriptResourceChange->hasData()) {
                    $data['JavaScriptResource_Changes'][] = $javaScriptResourceChange->getData();
                }
            }
        }

        if (count($this->getPropertyChanges())) {
            $data['Property_Changes'] = [];

            foreach ($this->getPropertyChanges() as $i => $propertyChange) {
                if ($propertyChange->hasData()) {
                    $data['Property_Changes'][] = $propertyChange->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data)
    {
        return new \MerchantAPI\Response\ChangesetCreate($this, $httpResponse, $data);
    }
}