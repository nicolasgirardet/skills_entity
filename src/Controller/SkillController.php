<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;

class SkillController extends AbstractController
{
    #[Route('/')]
    public function skillIndex(): Response
    {
        return $this->render('skills/all_skills.html.twig');
    }
}