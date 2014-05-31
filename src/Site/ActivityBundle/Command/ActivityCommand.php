<?php

namespace Site\ActivityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ActivityCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('activity:check:finished')
            ->setDescription('Look up for each activity if its terminated, and generate corrections group if so.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Activity");
		$activities = $repo->findAll();

		foreach($activities as $activity)
		{
			if ($activity->getEnd() < $date && $activity->getEndCorrection() > $date)
				$output->writeln($activity->getName());
		}
    }
}
