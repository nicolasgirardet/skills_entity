<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use App\Entity\Skill;

class SkillController extends AbstractController
{
    public function skillIndex(): Response
    {
        return $this->render('skills/all_skills.html.twig');
    }

    public function skillEdit(Skill $skill): Response
    {
    return $this->render('skills/edit_skill.html.twig', [
        'id' => $skill->getId(),
        'slug' => $skill->getSlug(),
        'name' => $skill->getName(),
        'description' => $skill->getDescription()
]);
    }

    public function addEdit(): Response
    {
    return $this->render('skills/add_skill.html.twig');
    }
}