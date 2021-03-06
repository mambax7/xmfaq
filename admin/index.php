<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * xmfaq module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author          Mage Gregory (AKA Mage)
 */
require __DIR__ . '/header.php';

// header
xoops_cp_header();

// category
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('category_status', 1));
$category_active = $categoryHandler->getCount($criteria);
$criteria        = new CriteriaCompo();
$criteria->add(new Criteria('category_status', 0));
$category_notactive = $categoryHandler->getCount($criteria);
$admin_class->addInfoBox(_AM_XMFAQ_INDEX_CAT);
$admin_class->addInfoBoxLine(_AM_XMFAQ_INDEX_CAT, _AM_XMFAQ_INDEX_CAT_ACTIVE, $category_active, 'green');
$admin_class->addInfoBoxLine(_AM_XMFAQ_INDEX_CAT, _AM_XMFAQ_INDEX_CAT_NOTACTIVE, $category_notactive, 'red');

// question
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('question_status', 1));
$question_active = $questionHandler->getCount($criteria);
$criteria        = new CriteriaCompo();
$criteria->add(new Criteria('question_status', 0));
$question_nactive = $questionHandler->getCount($criteria);
$admin_class->addInfoBox(_AM_XMFAQ_INDEX_QUESTION);
$admin_class->addInfoBoxLine(_AM_XMFAQ_INDEX_QUESTION, _AM_XMFAQ_INDEX_QUESTION_ACTIVE, $question_active, 'green');
$admin_class->addInfoBoxLine(_AM_XMFAQ_INDEX_QUESTION, _AM_XMFAQ_INDEX_QUESTION_NACTIVE, $question_nactive, 'red');

$xoopsTpl->assign('navigation', $admin_class->addNavigation('index.php'));
$xoopsTpl->assign('renderindex', $admin_class->renderIndex());

// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/xmfaq/templates/admin/xmfaq_index.tpl');

xoops_cp_footer();
