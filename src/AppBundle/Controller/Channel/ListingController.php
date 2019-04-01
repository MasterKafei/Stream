<?php

namespace AppBundle\Controller\Channel;

use AppBundle\Entity\Channel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listChannelAction()
    {
        $channels = $this->getDoctrine()->getRepository(Channel::class)->findAll();

        return $this->render('@Page/Channel/Listing/list_channel.html.twig', array(
            'channels' => $channels,
        ));
    }
}