<?php

namespace AppBundle\Controller\Channel;


use AppBundle\Entity\Channel;
use AppBundle\Form\Type\Channel\Adding\AddFileType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AddingController extends Controller
{
    public function addFileAction(Request $request, Channel $channel)
    {
        $form = $this->createForm(AddFileType::class, $channel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($channel);
            $em->flush();

            return $this->redirectToRoute('app_channel_showing_show_channel', array(
                'id' => $channel->getId(),
            ));
        }

        return $this->render('@Page/Channel/Adding/add_file.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
