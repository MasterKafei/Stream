<?php

namespace AppBundle\Controller\File;

use AppBundle\Entity\File;
use AppBundle\Form\Type\File\Creation\CreateFileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createFileAction(Request $request)
    {
        $file = new File();
        $form = $this->createForm(CreateFileType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($file);
            $em->flush();
            return $this->redirectToRoute('app_file_listing_list_file');
        }

        return $this->render('@Page/File/Creation/create_file.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}