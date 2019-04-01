<?php

namespace AppBundle\Controller\Channel;

use AppBundle\Entity\Channel;
use AppBundle\Form\Type\Channel\Edition\EditChannelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editChannelAction(Request $request, Channel $channel)
    {
        $form = $this->createForm(EditChannelType::class, $channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($channel);
            $em->flush();

            return $this->redirectToRoute('app_channel_listing_list_channel');
        }

        return $this->render('@Page/Channel/Edition/edit_channel.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}