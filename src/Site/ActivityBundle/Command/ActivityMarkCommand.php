<?php

namespace Site\ActivityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Site\ActivityBundle\Entity\ScaleGroup;
use Site\ACtivityBundle\Entity\ActivityMark;

class ActivityMarkCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this->setName('activities:correction:activity')
			->setDescription('Look up for each activity if corrections are terminated, and define a final mark.');
	}

	private function correction(\Site\ActivityBundle\Entity\Activity $activity)
	{
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Activity");
		$activities = $repo->findAll();

		foreach($activities as $activity)
		{
			if ($activity->getEndCorrection() >= $date && $activity->AreCorrectionGroupsGenerated())
			{
				$output->writeln("Defining final note for " .$activity->getName());
				$this->correction($activity);
				$output->writeln("<info>" .$activity->getName(). "'s marks done!</info>");
			}
		}
	}
}
