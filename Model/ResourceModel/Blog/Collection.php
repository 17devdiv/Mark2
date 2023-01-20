<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By: Dotsquares Pvt. Ltd
 */
namespace Dotsquares\Productsinquiry\Model\ResourceModel\Blog;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Dotsquares\Productsinquiry\Model\Blog as BlogModel;
use Dotsquares\Productsinquiry\Model\ResourceModel\Blog as BlogResourceModel;
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(BlogModel::class, BlogResourceModel::class);
    }
}