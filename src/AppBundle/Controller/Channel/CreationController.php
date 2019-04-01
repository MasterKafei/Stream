<?php

namespace AppBundle\Controller\Channel;

use AppBundle\Entity\Channel;
use AppBundle\Form\Type\Channel\Creation\CreateChannelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createChannelAction(Request $request)
    {
        $channel = new Channel();
        $form = $this->createForm(CreateChannelType::class, $channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($channel);
            $em->flush();
            return $this->redirectToRoute('app_channel_listing_list_channel');
        }

        return $this->render('@Page/Channel/Creation/create_channel.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}