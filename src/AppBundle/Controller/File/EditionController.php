<?php

namespace AppBundle\Controller\File;

use AppBundle\Entity\File;
use AppBundle\Form\Type\File\Edition\EditFileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editFileAction(Request $request, File $file)
    {
        $form = $this->createForm(EditFileType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($file);
            $em->flush();

            return $this->redirectToRoute('app_file_listing_list_file');
        }

        return $this->render('@Page/File/Edition/edit_file.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}