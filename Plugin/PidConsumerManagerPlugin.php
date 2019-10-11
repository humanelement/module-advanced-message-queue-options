<?php

namespace HumanElement\AdvancedMessageQueueOptions\Plugin;

use HumanElement\AdvancedMessageQueueOptions\Helper\Data;
use Magento\MessageQueue\Model\Cron\ConsumersRunner\PidConsumerManager;

class PidConsumerManagerPlugin
{

    /**
     * @var \Magento\Framework\App\DeploymentConfig
     */
    protected $dataHelper;

    /**
     * PidConsumerManagerPlugin constructor.
     * @param Data $dataHelper
     */
    function __construct(
        Data $dataHelper
    )
    {
        $this->dataHelper = $dataHelper;
    }


    /**
     * @param PidConsumerManager $subject
     * @param $pidFilePath
     * @return array
     */
    public function beforeGetPid(PidConsumerManager $subject, $pidFilePath)
    {
        $customPidDir = $this->dataHelper->getPidDir();

        if(is_string($customPidDir) && strlen($customPidDir) > 0) {
            $pidFilePath = trim($customPidDir, '/').'/'.$pidFilePath;
        }

        return [$pidFilePath];
    }

    /**
     * @param PidConsumerManager $subject
     * @param $pidFilePath
     * @return array
     */
    public function beforeSavePid(PidConsumerManager $subject, $pidFilePath)
    {
        $customPidDir = $this->dataHelper->getPidDir();

        if(is_string($customPidDir) && strlen($customPidDir) > 0) {
            $pidFilePath = trim($customPidDir, '/').'/'.$pidFilePath;
        }

        return [$pidFilePath];
    }

}