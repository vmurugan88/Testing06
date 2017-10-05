<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magentocommerce.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Paypal
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/** @var $this Mage_Core_Model_Resource_Setup */
$installer = $this;
$connection = $installer->getConnection();
$installer->startSetup();
$data = array(
    array('paypal_reversed', 'PayPal Reversed'),
    array('paypal_canceled_reversal', 'PayPal Canceled Reversal')
);
$connection = $installer->getConnection()->insertArray(
    $installer->getTable('sales/order_status'),
    array('status', 'label'),
    $data
);
/**
 * Set default value for "skip order review page" option for Express Checkout for new installations
 */
$ecSkipOrderReviewStepFlagPath = 'payment/paypal_express/skip_order_review_step';
Mage::getConfig()->saveConfig($ecSkipOrderReviewStepFlagPath, '1');
$installer->endSetup();