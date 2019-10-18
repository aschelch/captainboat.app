<?php

namespace App\Controller;

use App\Entity\Harbor;
use App\Form\HarborType;
use App\Repository\HarborRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/harbor")
 */
class HarborController extends AbstractController
{
    /**
     * @Route("/", name="harbor_index", methods={"GET"})
     */
    public function index(HarborRepository $harborRepository): Response
    {
        return $this->render('harbor/index.html.twig', [
            'harbors' => $harborRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="harbor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $harbor = new Harbor();
        $form = $this->createForm(HarborType::class, $harbor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($harbor);
            $entityManager->flush();

            return $this->redirectToRoute('harbor_index');
        }

        return $this->render('harbor/new.html.twig', [
            'harbor' => $harbor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="harbor_show", methods={"GET"})
     */
    public function show(Harbor $harbor): Response
    {
        return $this->render('harbor/show.html.twig', [
            'harbor' => $harbor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="harbor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Harbor $harbor): Response
    {
        $form = $this->createForm(HarborType::class, $harbor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('harbor_index');
        }

        return $this->render('harbor/edit.html.twig', [
            'harbor' => $harbor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="harbor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Harbor $harbor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$harbor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($harbor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('harbor_index');
    }
}
