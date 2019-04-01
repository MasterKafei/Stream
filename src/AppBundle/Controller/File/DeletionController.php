<?php

namespace AppBundle\Controller\File;

use AppBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeletionController extends Controller
{
    public function deleteFileAction(File $file)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($file);
        $em->flush();

        return $this->redirectToRoute('app_file_listing_list_file');
    }
}