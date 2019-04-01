<?php

namespace AppBundle\Controller\File;

use AppBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listFileAction()
    {
        $files = $this->getDoctrine()->getRepository(File::class)->findAll();

        return $this->render('@Page/File/Listing/list_file.html.twig', array(
            'files' => $files,
        ));
    }
}