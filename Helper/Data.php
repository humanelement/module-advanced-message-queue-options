<?php
namespace HumanElement\AdvancedMessageQueueOptions\Helper;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\Helper\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var DeploymentConfig
     */
    protected $deploymentConfig;

    /**
     * Data constructor.
     * @param Context $context
     * @param DeploymentConfig $deploymentConfig
     */
    function __construct (
        Context $context,
        DeploymentConfig $deploymentConfig
    )
    {
        $this->deploymentConfig = $deploymentConfig;
        parent::__construct($context);
    }

    const MESSAGE_QUEUE_PID_DIR_CONFIG_PATH = 'cron_consumers_runner/pid_dir';

    /**
     * @return string|null
     */
    public function getPidDir(){
        return $this->deploymentConfig->get(self::MESSAGE_QUEUE_PID_DIR_CONFIG_PATH);
    }
}