<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Backend\Block\Widget\Grid\Column\Filter;

/**
 * Select grid column filter
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Select extends \Magento\Backend\Block\Widget\Grid\Column\Filter\AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected function _getOptions()
    {
        $emptyOption = ['value' => null, 'label' => ''];

        $optionGroups = $this->getColumn()->getOptionGroups();
        if ($optionGroups) {
            array_unshift($optionGroups, $emptyOption);
            return $optionGroups;
        }

        $colOptions = $this->getColumn()->getOptions();
        if (!empty($colOptions) && is_array($colOptions)) {
            $options = [$emptyOption];

            foreach ($colOptions as $key => $option) {
                if (is_array($option)) {
                    $options[] = $option;
                } else {
                    $options[] = ['value' => $key, 'label' => $option];
                }
            }
            return $options;
        }
        return [];
    }

    /**
     * Render an option with selected value
     *
     * @param array $option
     * @param string $value
     * @return string
     */
    protected function _renderOption($option, $value)
    {
        $selected = $option['value'] == $value && !is_null($value) ? ' selected="selected"' : '';
        return '<option value="' . $this->escapeHtml(
            $option['value']
        ) . '"' . $selected . '>' . $this->escapeHtml(
            $option['label']
        ) . '</option>';
    }

    /**
     * {@inheritdoc}
     */
    public function getHtml()
    {
        $html = '<select name="' . $this->_getHtmlName() . '" id="' . $this->_getHtmlId() . '"' . $this->getUiId(
            'filter',
            $this->_getHtmlName()
        ) . 'class="no-changes">';
        $value = $this->getValue();
        foreach ($this->_getOptions() as $option) {
            if (is_array($option['value'])) {
                $html .= '<optgroup label="' . $this->escapeHtml($option['label']) . '">';
                foreach ($option['value'] as $subOption) {
                    $html .= $this->_renderOption($subOption, $value);
                }
                $html .= '</optgroup>';
            } else {
                $html .= $this->_renderOption($option, $value);
            }
        }
        $html .= '</select>';
        return $html;
    }

    /**
     * {@inheritdoc}
     */
    public function getCondition()
    {
        if (is_null($this->getValue())) {
            return null;
        }
        return ['eq' => $this->getValue()];
    }
}