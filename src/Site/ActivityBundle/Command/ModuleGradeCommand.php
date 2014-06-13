<?php

namespace Site\ActivityBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Site\ActivityBundle\Entity\ScaleGroup;
use Site\ActivityBundle\Entity\ModuleGrade;

class ModuleGradeCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this->setName('activities:correction:module')
			->setDescription('Look up for each module if its terminated, and define a grade for each student.');
	}

	private function correction(\Site\ActivityBundle\Entity\Module $module)
	{
		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("ApplicationSonataUserBundle:User");
		$students = $repo->findAll();
		$em = $this->getContainer()->get('doctrine')->getManager();

		foreach ($students as $student)
		{
			if ($module->getStudents()->contains($student))
			{
				$grade = new ModuleGrade();
				$grade->setStudent($student);
				$grade->setModule($module);

				$marks = $student->getMarks();
				if ($marks->isEmpty() == false)
				{
					$max = 0;
					$note = 0;
					foreach ($student->getMarks() as $mark)
					{
						if ($mark->getActivity()->getModule() == $module)
						{
							$max += $mark->getActivity()->getScale()->getMark();
							$note += $mark->getMark();
						}
					}
					if ($max != 0)
						$finalnote = $note / $max * 100;
					else
						$finalnote = -1;

					if ($finalnote <= 100 && $finalnote >= 80)
						$grade->setGrade("A");
					else if ($finalnote < 80 && $finalnote >= 60)
						$grade->setGrade("B");
					else if ($finalnote < 60 && $finalnote >= 40)
						$grade->setGrade("C");
					else if ($finalnote < 40 && $finalnote >= 20)
						$grade->setGrade("D");
					else
						$grade->setGrade("ECHEC");
				}
				else
					$grade->setGrade("ECHEC");
				if ($grade->getGrade() != "ECHEC")
					$grade->setCredits($module->getCredits());
				else
					$grade->setCredits(0);
				$em->persist($grade);
			}
			else if ($module->getOptionnal() == 0)
			{
				$grade = new ModuleGrade();
				$grade->setStudent($student);
				$grade->setModule($module);
				$grade->setGrade("ECHEC");
				$grade->setCredits(0);
				$em->persist($grade);
			}
		}
		$em->flush();
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$date = new \Datetime();

		$repo = $this->getContainer()->get('doctrine')->getManager()->getRepository("SiteActivityBundle:Module");
		$modules = $repo->findAll();

		foreach($modules as $module)
		{
			if ($module->getEnd() >= $date && !$module->areGradesGiven())
			{
				$output->writeln("Defining grades for " .$module->getName());
				$this->correction($module);
				$output->writeln("<info>" .$module->getName(). "'s grades given!</info>");
			}
		}
	}
}
