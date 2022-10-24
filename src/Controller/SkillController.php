<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use App\Entity\Skill;
use App\Repository\SkillRepository;

class SkillController extends AbstractController
{
    public function skillIndex(): Response
    {
        return $this->render('skills/all_skills.html.twig');
    }

    #[Route('/skills/{id}')]
    public function skillEdit(Skill $skill, SkillRepository $skillRepository): Response
    {
        $skillEncoded = json_encode($skill);
        dump($skillEncoded);
    return $this->render('skills/edit_create_skill.html.twig', [
        'skillEncoded' => $skillEncoded,
]);
    }
}