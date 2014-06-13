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

	private function getGroup(\Site\ActivityBundle\Entity\Activity $activity, \Application\Sonata\UserBundle\Entity\User $student)
	{
		foreach ($student->getActivityGroups() as $group)
		{
			if ($group->getActivity() == $activity)
				return ($group);
		}
		return (null);
	}

	private function correction(\Site\ActivityBundle\Entity\Activity $activity)
	{
		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("ApplicationSonataUserBundle:User");
		$students = $repo->findAll();
		$em = $this->getContainer()->get('doctrine')->getManager();

		foreach ($students as $student)
		{
			$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:ScaleGroup");
			$group = $this->getGroup($activity, $student);
			if ($group)
				$scales = $repo->findBy(array("activity" => $activity, "group" => $group), array("activity" => 'DESC'));
			else
				$scales = null;
			if ($scales)
			{
				$i = 0;
				$total = 0;
				foreach ($scales as $scale)
				{
					$total += $scale->getNote();
					$i++;
				}
				$total = $total / $i;
				$mark = new ActivityMark();
				$mark->setStudent($student);
				$mark->setActivity($activity);
				$mark->setMark($total);
				$em->persist($mark);
			}
			else if (!$scales && $activity->getOptionnal() == 0)
			{
				$mark = new ActivityMark();
				$mark->setStudent($student);
				$mark->setActivity($activity);
				$mark->setMark(0);
				$em->persist($mark);
			}
		}
		$em->flush();
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Activity");
		$activities = $repo->findAll();

		foreach($activities as $activity)
		{
			if ($activity->getEndCorrection() >= $date && !$activity->areMarksGiven())
			{
				$output->writeln("Defining final marks for " .$activity->getName());
				$this->correction($activity);
				$output->writeln("<info>" .$activity->getName(). "'s marks given!</info>");
			}
		}
	}
}
