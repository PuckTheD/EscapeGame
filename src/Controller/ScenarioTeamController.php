<?php

namespace App\Controller;

use App\Entity\ScenarioTeam;
use App\Form\ScenarioTeamType;
use App\Repository\ScenarioTeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scenarioteam")
 */
class ScenarioTeamController extends AbstractController
{
    /**
     * @Route("/", name="scenario_team_index", methods={"GET"})
     */
    public function index(ScenarioTeamRepository $scenarioTeamRepository): Response
    {
        return $this->render('scenario_team/index.html.twig', [
            'scenario_teams' => $scenarioTeamRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scenario_team_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $scenarioTeam = new ScenarioTeam();
        $form = $this->createForm(ScenarioTeamType::class, $scenarioTeam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($scenarioTeam);
            $entityManager->flush();

            return $this->redirectToRoute('scenario_team_index');
        }

        return $this->render('scenario_team/new.html.twig', [
            'scenario_team' => $scenarioTeam,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scenario_team_show", methods={"GET"})
     */
    public function show(ScenarioTeam $scenarioTeam): Response
    {
        return $this->render('scenario_team/show.html.twig', [
            'scenario_team' => $scenarioTeam,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scenario_team_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ScenarioTeam $scenarioTeam): Response
    {
        $form = $this->createForm(ScenarioTeamType::class, $scenarioTeam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scenario_team_index');
        }

        return $this->render('scenario_team/edit.html.twig', [
            'scenario_team' => $scenarioTeam,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scenario_team_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ScenarioTeam $scenarioTeam): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scenarioTeam->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scenarioTeam);
            $entityManager->flush();
        }

        return $this->redirectToRoute('scenario_team_index');
    }
}
