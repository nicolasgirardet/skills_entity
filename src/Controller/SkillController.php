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

    #[Route('/skills/{id}')]
    public function skillEdit(Skill $skill): Response
    {
    return $this->render('skills/edit_delete_skill.html.twig', [
        'id' => $skill->getId(),
        'name' => $skill->getName(),
        'description' => $skill->getDescription()
]);
    }
}