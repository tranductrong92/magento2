<?php
/**
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Model\Product\Gallery;

use Magento\Catalog\Api\Data\ProductAttributeMediaGalleryEntryContentInterface;
use Magento\Framework\Exception\InputException;

class MimeTypeExtensionMap
{
    /**
     * MIME type/extension map
     *
     * @var array
     */
    protected $mimeTypeExtensionMap = [
        'image/jpg' => 'jpg',
        'image/jpeg' => 'jpg',
        'image/gif' => 'gif',
        'image/png' => 'png',
    ];

    /**
     * @param string $mimeType
     * @return string
     */
    public function getMimeTypeExtension($mimeType)
    {
        if (isset($this->mimeTypeExtensionMap[$mimeType])) {
            return $this->mimeTypeExtensionMap[$mimeType];
        } else {
            return "";
        }
    }
}