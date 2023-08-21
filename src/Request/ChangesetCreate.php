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
use MerchantAPI\Model\ModuleChange;
use MerchantAPI\Model\Branch;
use MerchantAPI\Model\Changeset;
use MerchantAPI\BaseClient;
use MerchantAPI\ResponseInterface;
use MerchantAPI\Collection;

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
    protected string $scope = self::REQUEST_SCOPE_STORE;

    /** @var string The API function name */
    protected string $function = 'Changeset_Create';

    /** @var ?int */
    protected ?int $branchId = null;

    /** @var ?string */
    protected ?string $branchName = null;

    /** @var ?string */
    protected ?string $editBranch = null;

    /** @var ?string */
    protected ?string $notes = null;

    /** @var ?string */
    protected ?string $tags = null;

    /** @var \MerchantAPI\Collection */
    protected Collection $templateChanges;

    /** @var \MerchantAPI\Collection */
    protected Collection $resourceGroupChanges;

    /** @var \MerchantAPI\Collection */
    protected Collection $CSSResourceChanges;

    /** @var \MerchantAPI\Collection */
    protected Collection $javaScriptResourceChanges;

    /** @var \MerchantAPI\Collection */
    protected Collection $propertyChanges;

    /** @var \MerchantAPI\Collection */
    protected Collection $moduleChanges;

    /**
     * Constructor.
     *
     * @param ?\MerchantAPI\BaseClient $client
     * @param ?\MerchantAPI\Model\Branch $branch
     */
    public function __construct(?BaseClient $client = null, ?Branch $branch = null)
    {
        parent::__construct($client);
        $this->templateChanges = new Collection();
        $this->resourceGroupChanges = new Collection();
        $this->CSSResourceChanges = new Collection();
        $this->javaScriptResourceChanges = new Collection();
        $this->propertyChanges = new Collection();
        $this->moduleChanges = new Collection();

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
    public function getBranchId() : ?int
    {
        return $this->branchId;
    }

    /**
     * Get Branch_Name.
     *
     * @return string
     */
    public function getBranchName() : ?string
    {
        return $this->branchName;
    }

    /**
     * Get Edit_Branch.
     *
     * @return string
     */
    public function getEditBranch() : ?string
    {
        return $this->editBranch;
    }

    /**
     * Get Notes.
     *
     * @return string
     */
    public function getNotes() : ?string
    {
        return $this->notes;
    }

    /**
     * Get Tags.
     *
     * @return string
     */
    public function getTags() : ?string
    {
        return $this->tags;
    }

    /**
     * Get Template_Changes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getTemplateChanges() : ?Collection
    {
        return $this->templateChanges;
    }

    /**
     * Get ResourceGroup_Changes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getResourceGroupChanges() : ?Collection
    {
        return $this->resourceGroupChanges;
    }

    /**
     * Get CSSResource_Changes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getCSSResourceChanges() : ?Collection
    {
        return $this->CSSResourceChanges;
    }

    /**
     * Get JavaScriptResource_Changes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getJavaScriptResourceChanges() : ?Collection
    {
        return $this->javaScriptResourceChanges;
    }

    /**
     * Get Property_Changes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getPropertyChanges() : ?Collection
    {
        return $this->propertyChanges;
    }

    /**
     * Get Module_Changes.
     *
     * @return \MerchantAPI\Collection
     */
    public function getModuleChanges() : ?Collection
    {
        return $this->moduleChanges;
    }

    /**
     * Set Branch_ID.
     *
     * @param ?int $branchId
     * @return $this
     */
    public function setBranchId(?int $branchId) : self
    {
        $this->branchId = $branchId;

        return $this;
    }

    /**
     * Set Branch_Name.
     *
     * @param ?string $branchName
     * @return $this
     */
    public function setBranchName(?string $branchName) : self
    {
        $this->branchName = $branchName;

        return $this;
    }

    /**
     * Set Edit_Branch.
     *
     * @param ?string $editBranch
     * @return $this
     */
    public function setEditBranch(?string $editBranch) : self
    {
        $this->editBranch = $editBranch;

        return $this;
    }

    /**
     * Set Notes.
     *
     * @param ?string $notes
     * @return $this
     */
    public function setNotes(?string $notes) : self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Set Tags.
     *
     * @param ?string $tags
     * @return $this
     */
    public function setTags(?string $tags) : self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Set Template_Changes.
     *
     * @param \MerchantAPI\Collection|array $templateChanges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setTemplateChanges($templateChanges) : self
    {
        if (!is_array($templateChanges) && !$templateChanges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($templateChanges) ? get_class($templateChanges) : gettype($templateChanges)));
        }

        foreach ($templateChanges as &$model) {
            if (is_array($model)) {
                $model = new TemplateChange($model);
            } else if (!$model instanceof TemplateChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of TemplateChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->templateChanges = new Collection($templateChanges);

        return $this;
    }

    /**
     * Set ResourceGroup_Changes.
     *
     * @param \MerchantAPI\Collection|array $resourceGroupChanges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setResourceGroupChanges($resourceGroupChanges) : self
    {
        if (!is_array($resourceGroupChanges) && !$resourceGroupChanges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($resourceGroupChanges) ? get_class($resourceGroupChanges) : gettype($resourceGroupChanges)));
        }

        foreach ($resourceGroupChanges as &$model) {
            if (is_array($model)) {
                $model = new ResourceGroupChange($model);
            } else if (!$model instanceof ResourceGroupChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of ResourceGroupChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->resourceGroupChanges = new Collection($resourceGroupChanges);

        return $this;
    }

    /**
     * Set CSSResource_Changes.
     *
     * @param \MerchantAPI\Collection|array $CSSResourceChanges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCSSResourceChanges($CSSResourceChanges) : self
    {
        if (!is_array($CSSResourceChanges) && !$CSSResourceChanges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($CSSResourceChanges) ? get_class($CSSResourceChanges) : gettype($CSSResourceChanges)));
        }

        foreach ($CSSResourceChanges as &$model) {
            if (is_array($model)) {
                $model = new CSSResourceChange($model);
            } else if (!$model instanceof CSSResourceChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of CSSResourceChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->CSSResourceChanges = new Collection($CSSResourceChanges);

        return $this;
    }

    /**
     * Set JavaScriptResource_Changes.
     *
     * @param \MerchantAPI\Collection|array $javaScriptResourceChanges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setJavaScriptResourceChanges($javaScriptResourceChanges) : self
    {
        if (!is_array($javaScriptResourceChanges) && !$javaScriptResourceChanges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($javaScriptResourceChanges) ? get_class($javaScriptResourceChanges) : gettype($javaScriptResourceChanges)));
        }

        foreach ($javaScriptResourceChanges as &$model) {
            if (is_array($model)) {
                $model = new JavaScriptResourceChange($model);
            } else if (!$model instanceof JavaScriptResourceChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of JavaScriptResourceChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->javaScriptResourceChanges = new Collection($javaScriptResourceChanges);

        return $this;
    }

    /**
     * Set Property_Changes.
     *
     * @param \MerchantAPI\Collection|array $propertyChanges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setPropertyChanges($propertyChanges) : self
    {
        if (!is_array($propertyChanges) && !$propertyChanges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($propertyChanges) ? get_class($propertyChanges) : gettype($propertyChanges)));
        }

        foreach ($propertyChanges as &$model) {
            if (is_array($model)) {
                $model = new PropertyChange($model);
            } else if (!$model instanceof PropertyChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of PropertyChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->propertyChanges = new Collection($propertyChanges);

        return $this;
    }

    /**
     * Set Module_Changes.
     *
     * @param \MerchantAPI\Collection|array $moduleChanges
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setModuleChanges($moduleChanges) : self
    {
        if (!is_array($moduleChanges) && !$moduleChanges instanceof Collection) {
            throw new \InvalidArgumentException(sprintf('Expected array or Collection but got %s',
                    is_object($moduleChanges) ? get_class($moduleChanges) : gettype($moduleChanges)));
        }

        foreach ($moduleChanges as &$model) {
            if (is_array($model)) {
                $model = new ModuleChange($model);
            } else if (!$model instanceof ModuleChange) {
                throw new \InvalidArgumentException(sprintf('Expected array of ModuleChange or an array of arrays but got %s',
                    is_object($model) ? get_class($model) : gettype($model)));
            }
        }

        $this->moduleChanges = new Collection($moduleChanges);

        return $this;
    }

    /**
     * Add Template_Changes.
     *
     * @param \MerchantAPI\Model\TemplateChange
     * @return $this
     */
    public function addTemplateChange(TemplateChange $model) : self
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
    public function addTemplateChanges(array $templateChanges) : self
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
     * @return $this
     */
    public function addResourceGroupChange(ResourceGroupChange $model) : self
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
    public function addResourceGroupChanges(array $resourceGroupChanges) : self
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
     * @return $this
     */
    public function addCSSResourceChange(CSSResourceChange $model) : self
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
    public function addCSSResourceChanges(array $CSSResourceChanges) : self
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
     * @return $this
     */
    public function addJavaScriptResourceChange(JavaScriptResourceChange $model) : self
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
    public function addJavaScriptResourceChanges(array $javaScriptResourceChanges) : self
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
     * @return $this
     */
    public function addPropertyChange(PropertyChange $model) : self
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
    public function addPropertyChanges(array $propertyChanges) : self
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
     * Add Module_Changes.
     *
     * @param \MerchantAPI\Model\ModuleChange
     * @return $this
     */
    public function addModuleChange(ModuleChange $model) : self
    {
        $this->moduleChanges[] = $model;
        return $this;
    }

    /**
     * Add many ModuleChange.
     *
     * @param (\MerchantAPI\Model\ModuleChange|array)[]
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function addModuleChanges(array $moduleChanges) : self
    {
        foreach ($moduleChanges as $e) {
            if (is_array($e)) {
                $this->moduleChanges[] = new ModuleChange($e);
            } else if ($e instanceof ModuleChange) {
                $this->moduleChanges[] = $e;
            } else {
                throw new \InvalidArgumentException(sprintf('Expected array of ModuleChange or an array of arrays but got %s',
                    is_object($e) ? get_class($e) : gettype($e)));
            }
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
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

        if (count($this->getModuleChanges())) {
            $data['Module_Changes'] = [];

            foreach ($this->getModuleChanges() as $i => $moduleChange) {
                if ($moduleChange->hasData()) {
                    $data['Module_Changes'][] = $moduleChange->getData();
                }
            }
        }

        return $data;
    }

    /**
     * @inheritDoc
     */
    public function createResponse(HttpResponse $httpResponse, array $data) : ResponseInterface
    {
        return new \MerchantAPI\Response\ChangesetCreate($this, $httpResponse, $data);
    }
}