<?php

namespace AppBundle\Controller\Channel;

use AppBundle\Entity\Channel;
use FFMpeg\Media\Video;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ShowingController extends Controller
{
    public function showChannelAction(Channel $channel)
    {
        return $this->render('@Page/Channel/Showing/show_channel.html.twig', array(
            'channel' => $channel,
        ));
    }

    public function streamFileAction(Channel $channel)
    {
        $path = $this->getParameter('vich_uploader.directory_upload.absolute_path') . '/' . $channel->getFile()->getPath();
        $size = 0;
        $callback = function() use ($path, $size)
        {
            do{
                $content = file_get_contents($path, false, null, $size, $size + 1573014);
                $size += 1573015;
                sleep(5);
                if(!$content) {
                    break;
                }
                echo $content;
            }while(true);
        };

        return new StreamedResponse($callback);
    }
}