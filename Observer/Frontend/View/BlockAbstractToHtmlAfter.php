<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Genaker\Profiler\Observer\Frontend\View;

class BlockAbstractToHtmlAfter implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    ) {
        if (!isset($GLOBALS['pstart'])) return 0;
        if (!isset($_GET['ptoken']) && $_GET['ptoken'] !== '999')) return 0;
        $issue = false;
        $issueText = '';
        $duration = $end - $GLOBALS['pstart'];
        
        if ($duration > 0.1) { 
            $issue = true; 
            $issueText = '!!!';
        }
        
        echo "<!-- The Block " . $this->getModuleName() . ' - ' . $this->getNameInLayout() . ' ' . $issueText . " took " . $duration . " seconds to complete. -->";
       
        return 1;
    }
}

