<?php

namespace AppBundle\Controller\File;

use AppBundle\Entity\File;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showFileAction(File $file)
    {
        return $this->render('@Page/File/Showing/show_file.html.twig', array(
            'file' => $file,
        ));
    }
}