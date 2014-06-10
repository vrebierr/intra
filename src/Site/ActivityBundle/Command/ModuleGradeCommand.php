<?php

namespace Site\ActivityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Site\ActivityBundle\Entity\ScaleGroup;
use Site\ACtivityBundle\Entity\ActivityMark;

class ModuleGradeCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this->setName('activities:correction:module')
			->setDescription('Look up for each module if its terminated, and define a grade for each student.');
	}

	private function correction(\Site\ActivityBundle\Entity\Activity $activity)
	{
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Module");
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
