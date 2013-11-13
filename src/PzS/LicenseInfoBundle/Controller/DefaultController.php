<?php

namespace PzS\LicenseInfoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PzSLicenseInfoBundle:Default:index.html.twig', array());
    }

    public function resultAction(Request $request)
    {
    	// auswerten der POST-Werte
    	$kundeJaNein = intval($request->get('kundeJaNein'));
    	$wbb31NeuJaNein = intval($request->get('wbb31NeuJaNein'));
    	$updateZugang31JaNein = intval($request->get('updateZugang31JaNein'));
    	$updateZugang30JaNein = intval($request->get('updateZugang30JaNein'));
    	$messageGut = 'Glückwunsch, Sie haben bereits Zugang zum WBB 4 und müssen nichts mehr unternehmen.';
    	$messageNeu = 'Wenn Sie das WBB 4 direkt erwerben, bezahlen Sie 79,99€.';
    	$messageUpdate = 'Um Zugang zum WBB 4 zu erhalten, müssen Sie einen Updatezugang für 39,99€ kaufen.';

    	$message = '';
    	$status = '';
    	if (!$kundeJaNein) {
    		$message = $messageNeu;
    		$status = 'info';
    	}
    	else {
    		if ($wbb31NeuJaNein) {
    			if ($updateZugang31JaNein) {
    				$message = $messageGut;
    				$status = 'success';
    			}
    			else {
    				$message = $messageUpdate;
    				$status = 'warning';
    			}
    		}
    		else {
    			if ($updateZugang30JaNein) {
	    			$message = $messageGut;
	    			$status = 'success';
    			}
    			else {
    				$message = $messageUpdate;
    				$status = 'warning';
    			}
    		}
    	}

    	return $this->render('PzSLicenseInfoBundle:Default:result.html.twig', array(
    		'message' => $message,
    		'status' => $status
    	));	
    }
}
