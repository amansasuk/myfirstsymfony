<?php

namespace App\Controller;

use App\Entity\Myfrnds;
use App\Form\MyfrndsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyfirstController extends AbstractController
{
    /**
     * @Route("/myfirst", name="myfirst")
     */
    public function index(): Response
    {
        return $this->render('myfirst/index.html.twig', [
            'controller_name' => 'MyfirstController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function show(Request $request): Response
    {   
        $Myfrnds = new Myfrnds();
        $noteForm = $this->createForm(MyfrndsType::class, $Myfrnds);
        $noteForm->handleRequest($request);
        if ($noteForm->isSubmitted() && $noteForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em ->persist($Myfrnds);
            $em->Flush();

            $this->addFlash('notice','submit Successfully');
            return $this->redirectToRoute('view');
            
        }


        return $this->render('myfirst/index.html.twig', [
            'form' => $noteForm->createView()
        ]);
    }
    /**
     * @Route("/view", name="view")
     */
    public function view(){

        $data = $this->getDoctrine()->getRepository(Myfrnds::class)->findAll();
        return $this->render('myfirst/view.html.twig',[
            'list' => $data
            
        ]);
    }

    /**
     * @Route("/update/{id}", name="update")
     */

    public function update(Request $request, $id): Response{

        $Myfrnds = $this->getDoctrine()->getRepository(Myfrnds::class)->find($id);
        
        $noteForm = $this->createForm(MyfrndsType::class, $Myfrnds);
        $noteForm->handleRequest($request);
        if ($noteForm->isSubmitted() && $noteForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em ->persist($Myfrnds);
            $em->Flush();

            $this->addFlash('notice','update Successfully');
            
        }


        return $this->render('myfirst/update.html.twig', [
            'form' => $noteForm->createView()
        ]);

    }

        /**
     * @Route("/delete/{id}", name="delete")
     */

    public function delete($id){

        $Myfrnds = $this->getDoctrine()->getRepository(Myfrnds::class)->find($id);
        $em = $this->getDoctrine()->getManager();
            $em ->remove($Myfrnds);
            $em->Flush();

            $this->addFlash('notice','update Successfully');
        return $this->redirectToRoute('view');

        

    }
}
