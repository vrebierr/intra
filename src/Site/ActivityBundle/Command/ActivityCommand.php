<?php

namespace Site\ActivityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Site\ActivityBundle\Entity\ScaleGroup;

class ActivityCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this->setName('activity:check:finished')
			->setDescription('Look up for each activity if its terminated, and generate corrections group if so.');
	}


	private function checkKeysValidity(array $keys, array $corrected, $corrector)
	{
		foreach($keys as $key)
		{
			foreach($corrected[$key]->getStudents() as $student)
			{
				if ($student == $corrector)
					return (false);
			}
		}
		return (true);
	}

	private function generateCorrectionGroups(\Site\ActivityBundle\Entity\Activity $activity)
	{
		$em = $this->getContainer()->get('doctrine')->getManager();
		$groups = $em->getRepository('SiteActivityBundle:ActivityGroup')->findBy(array("activity" => $activity));
		$scale = $em->getRepository('SiteActivityBundle:Scale')->findOneBy(array("activity" => $activity));
		$students = $activity->getStudents()->toArray();

		foreach($students as $student)
		{
			if ($activity->getPeers() > count($groups))
				$keys = array_rand($groups, count($groups));
			else
				$keys = array_rand($groups, $activity->getPeers());
			if ($keys)
			{
				while (!$this->checkKeysValidity($keys, $groups, $student))
				{
					if ($activity->getPeers() > count($groups))
						$keys = array_rand($groups, count($groups));
					else
						$keys = array_rand($groups, $activity->getPeers());
				}
				foreach($keys as $key)
				{
					$scaleGroup = new ScaleGroup();
					$scaleGroup->setGroup($groups[$key]);
					$scaleGroup->setRater($student);
					$scaleGroup->setScale($scale);
					$scaleGroup->setActivity($activity);
					$groups[$key]->peers += 1;
					if ($groups[$key]->peers == $activity->getPeers())
						unset($groups[$key]);
					$em->persist($scaleGroup);
				}
			}
		}
		$activity->setCorrectionGenerated(true);
		$em->persist($activity);
		$em->flush();
		return;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Activity");
		$activities = $repo->findAll();

		foreach($activities as $activity)
		{
<<<<<<< HEAD
			if ($activity->getEnd() < $date && $activity->getEndCorrection() > $date && !$activity->AreCorrectionGroupsGenerated())
			{
				$output->writeln("Generating correction groups for " .$activity->getName());
				$this->generateCorrectionGroups($activity);
				$output->writeln("<info>" .$activity->getName(). " correction groups generated !</info>");
=======
			if ($activity->getEnd() < $date && $activity->getEndCorrection() > $date)
			{
				$em = $this->getContainer()->get('doctrine')->getManager();
				$groups = $em->getRepository('SiteActivityBundle:ActivityGroup')->findBy(array("activity" => $activity));
				$scale = $em->getRepository('SiteActivityBundle:Scale')->findOneBy(array("activity" => $activity));
				$students = $activity->getStudents()->toArray();
				shuffle($groups);
				shuffle($students);
				foreach ($students as $student)
				{
					for ($i = 0; $i < 4; $i++)
					{
						$scale_group = new ScaleGroup();
						$rand = rand(0, count($groups) - 1);
						while ($groups[$rand]->getStudents()->contains($student))
						{
							if (!isset($groups[1]))
								break;
							$rand = rand(0, count($groups) - 1);
						}
						$scale_group->setGroup($groups[$rand]);
						$scale_group->setRater($student);
						$scale_group->setScale($scale);
						$em->persist($scale_group);
						$groups[$rand]->peers += 1;
						if ($groups[$rand]->peers == 4)
							$groups = array_splice($groups, $rand);
					}
				}
				$em->flush();
				$output->writeln($activity->getName());
>>>>>>> 5406605ecba47f118397300ca995a490fbc0bc2a
			}
		}
	}
}
