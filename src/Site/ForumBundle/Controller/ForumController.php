<?php

namespace Site\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sonata\UserBundle\Model\UserInterface;

use Site\ForumBundle\Entity\ForumBoard;
use Site\ForumBundle\Entity\ForumSubboard;
use Site\ForumBundle\Entity\ForumThread;
use Site\ForumBundle\Entity\ForumPost;
use Site\ForumBundle\Entity\ForumComment;

use Site\ForumBundle\Form\ThreadType;
use Site\ForumBundle\Form\PostType;
use Site\ForumBundle\Form\CommentType;

use Symfony\Component\HttpFoundation\Request;

class ForumController extends Controller
{
	public function forumAction()
	{
		$data = array();
		$repo = $this->getDoctrine()->getManager()->getRepository("SiteForumBundle:ForumBoard");
		$listboards = $repo->findAll();
		$data['listboards'] = $listboards;

		$user = $this->container->get("security.context")->getToken()->getUser();
		if ($user instanceOf UserInterface)
			$data['user'] = $user;
		else
			$data['user'] = null;

		return $this->render('SiteForumBundle:Forum:forum.html.twig', $data);
	}

	public function boardAction(ForumBoard $board)
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();

		if ($user instanceof userinterface)
			$data['user'] = $user;
		else
			$data['user'] = null;

		$data['board'] = $board;

		return $this->render('SiteForumBundle:Forum:board.html.twig', $data);
	}

	public function subboardAction(ForumSubboard $subboard)
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();

		if ($user instanceof userinterface)
		{
			$form = $this->createForm(new ThreadType());
			$data['form'] = $form->createView();
			$data['user'] = $user;
		}
		else
		{
			$data['form'] = null;
			$data['user'] = null;
		}

		$request = $this->getRequest();
		if ($request->isMethod("POST"))
		{
			$form->bind($request);
			if ($form->isValid())
			{

				$postVal = $request->request->get("site_forumbundle_threadtype");
				$thread = new ForumThread();
				$thread->setSubboard($subboard);
				$thread->setTitle($postVal['title']);
				$thread->setAuthor($user);
				$thread->setContent($postVal['content']);
				$subboard->addThread($thread);

				$em = $this->getDoctrine()->getManager();
				$em->persist($thread);
				$em->flush();

			}
		}

		$data['subboard'] = $subboard;
		return $this->render('SiteForumBundle:Forum:subboard.html.twig', $data);
	}

	public function threadAction(ForumThread $thread)
	{
		$data = array();
		$user = $this->container->get("security.context")->getToken()->getUser();
		if ($user instanceOf UserInterface)
		{
			$formPost = $this->createForm(new PostType());
			$data['formpost'] = $formPost->createView();
			$data['user'] = $user;
		}
		else
		{
			$data['formpost'] = null;
			$data['user'] = null;
		}

		$request = $this->getRequest();
		if ($request->isMethod("POST") && isset($_POST['post']))
		{
			$formPost->bind($request);
			if ($formPost->isValid())
			{
				$postVal = $request->request->get("site_forumbundle_posttype");
				$post = new ForumPost();
				$post->setThread($thread);
				$post->setAuthor($user);
				$post->setContent($postVal['content']);

				$em = $this->getDoctrine()->getManager();
				$em->persist($post);
				$em->flush();
			}
		}
		else if ($request->isMethod("POST") && isset($_POST['comment']))
		{
				$comment = new ForumComment();
				$comment->setThread($thread);
				$comment->setAuthor($user);
				$comment->setContent($_POST['content']);
				$repo = $this->getDoctrine()->getManager()->getRepository("SiteForumBundle:ForumPost");
				$post = $repo->findOneById($_POST['postid']);
				$comment->setPost($post);

				$em = $this->getDoctrine()->getManager();
				$em->persist($comment);
				$em->flush();
		}

		$data['thread'] = $thread;

		return $this->render('SiteForumBundle:Forum:thread.html.twig', $data);
	}

}
