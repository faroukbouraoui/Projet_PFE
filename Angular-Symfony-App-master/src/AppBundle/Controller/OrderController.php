<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Services\Helpers;
use AppBundle\Services\JwtAuth;

use AppBundle\Entity\Commande;

class OrderController extends Controller{

	public function newAction(Request $request){
		$helpers = $this->get(Helpers::class);
		$jwt_auth = $this->get(JwtAuth::class);

		$token = $request->get("authorization",null);
		$authCheck = $jwt_auth->checkToken($token);
		if($authCheck){
			$identity = $jwt_auth->checkToken($token, true);
			$parametersAsArray = [];
			if ($content = $request->getContent()) {
			$parametersAsArray = json_decode($content, true);
			}
			$identity = $jwt_auth->checkToken($token, true);
			$str = substr($identity,strpos($identity,"email")+2,strpos($identity,"name")-42);
			
			$email = substr($str,strpos($str,":")+2);

			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository('AppBundle:User')->findOneBy(array(
								"email"=>$email
			));

			if($parametersAsArray != null){


				$createdAt = new \Datetime('now');

				$user_id 	= ($user->getId() !=null) ? $user->getId() : null;
				$total		= (isset($parametersAsArray['total'])) ? $parametersAsArray['total'] : null;
				if($user_id != null && $total !=null){

					$em = $this->getDoctrine()->getManager();
					$user = $em->getRepository('AppBundle:User')->findOneBy(array(
						'id' => $user_id
					));

						$commande = new Commande();
						$commande->setUser($user);
						$commande->setTotal($total);
						$commande->setDateCommande($createdAt);

						$em->persist($commande);
						$em->flush();

						$data = array(
							"data" 		=> $commande
						);
					

					

				}else{
					$data = array(
						"data" 	=> "error",
					);
				}

			}else{
				$data = array(
					"data" 		=> "parameters failed"
				);
			}

			
		}else{
			$data = array(
				"data" 		=> "Failed ! check your token validation !!"
			);
		}

		return $helpers->json($data);
	}

	public function ordersAction(Request $request){
		$helpers = $this->get(Helpers::class);
		$jwt_auth = $this->get(JwtAuth::class);

		$token = $request->get("authorization",null);
		$authCheck = $jwt_auth->checkToken($token);

		if($authCheck){
			$identity = $jwt_auth->checkToken($token, true);
			$str = substr($identity,strpos($identity,"email")+2,strpos($identity,"name")-42);
			
			$email = substr($str,strpos($str,":")+2);
			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository('AppBundle:User')->findOneBy(array(
								"email"=>$email
			));
			$dql = "SELECT t.id,t.total FROM AppBundle:Commande t WHERE t.user = {$user->getId()} ORDER BY t.id DESC";
			$query = $em->createQuery($dql);

			

			$data = array(
				'data'=>$query->getResult()
			);

		}else{
			$data = array(
				'data'	=>'Failed ! check your token validation'
			);
		}

		return $helpers->json($data);
	}
}