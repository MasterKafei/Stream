<?php

namespace AppBundle\Controller\Channel;

use AppBundle\Entity\Channel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeletionController extends Controller
{
    public function deleteChannelAction(Channel $channel)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($channel);
        $em->flush();

        return $this->redirectToRoute('app_channel_listing_list_channel');
    }
}