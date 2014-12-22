<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Tools\Dependency\Report\Circular\Data;

/**
 * Module
 */
class Module
{
    /**
     * Module name
     *
     * @var string
     */
    protected $name;

    /**
     * Circular dependencies chains
     *
     * @var \Magento\Tools\Dependency\Report\Circular\Data\Chain[]
     */
    protected $chains;

    /**
     * Module construct
     *
     * @param array $name
     * @param \Magento\Tools\Dependency\Report\Circular\Data\Chain[] $chains
     */
    public function __construct($name, array $chains = [])
    {
        $this->name = $name;
        $this->chains = $chains;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get circular dependencies chains
     *
     * @return \Magento\Tools\Dependency\Report\Circular\Data\Chain[]
     */
    public function getChains()
    {
        return $this->chains;
    }

    /**
     * Get circular dependencies chains count
     *
     * @return int
     */
    public function getChainsCount()
    {
        return count($this->chains);
    }
}