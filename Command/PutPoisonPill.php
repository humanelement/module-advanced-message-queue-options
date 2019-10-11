<?php
namespace HumanElement\AdvancedMessageQueueOptions\Command;
use Magento\Framework\MessageQueue\PoisonPill\PoisonPillPutInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PutPoisonPill extends Command {

    /**
     * @var PoisonPillPutInterface
     */
    protected $pillPut;

    public function __construct(
        PoisonPillPutInterface $pillPut
    ) {
        parent::__construct();
        $this->pillPut = $pillPut;
    }

    /**
     * Init command
     */
    protected function configure()
    {
        $this->setName('he:queue:consumers:poison')
            ->setDescription('Puts a poison pill to kill the consumers');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $poisonPillVersion = $this->pillPut->put();
        $output->writeln("Queue consumers have been poisoned successfully");
        $output->writeln("New Poison Pill Version: ".$poisonPillVersion);
    }

}