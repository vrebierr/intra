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

    protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Activity");
		$activities = $repo->findAll();

		foreach($activities as $activity)
		{
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
			}
		}
    }
}
