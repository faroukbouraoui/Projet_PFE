<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Services\Helpers;
use AppBundle\Services\JwtAuth;

use AppBundle\Entity\User;

class UserController extends Controller{

	public function loginAction(Request $request){
        $helpers = $this->get(Helpers::class);

        $parametersAsArray = [];
        if ($content = $request->getContent()) {
        $parametersAsArray = json_decode($content, true);
        }


        $data = array(
            'status'=>'error',
            'data'=>'Send json via post.'
        );

        if($parametersAsArray != null){


            $email = (isset($parametersAsArray['email'])) ? $parametersAsArray['email'] : null;
            $password = (isset($parametersAsArray['password'])) ? $parametersAsArray['password'] : null;
            $getHash = (isset($parametersAsArray['password'])) ? $parametersAsArray['password'] : null;

            $emailConstraint = new Assert\Email();
            $emailConstraint->message = "This email is not valid!";
            $validate_email = $this->get('validator')->validate($email, $emailConstraint);

            $pwd = hash('sha256', $password);

            if(count($validate_email) == 0 && $password != null){

                $jwt_auth = $this->get(JwtAuth::class);

                if($getHash == null || $getHash == false){
                    $signup = $jwt_auth->signup($email, $pwd);
                }else{
                    $signup = $jwt_auth->signup($email, $pwd, true);
                }

                return $this->json($signup);

            }else{
                $data = array(
                    'data'=>'Email or password Incorrect.'
                );
            }
        }

        return $helpers->json($data);
    }

	public function newAction(Request $request){
		$helpers = $this->get(Helpers::class);
		
		$parametersAsArray = [];
    	if ($content = $request->getContent()) {
        $parametersAsArray = json_decode($content, true);
    	}
		
		$data = array(
			'data' => 'error',
		);

		if($parametersAsArray !=null){
			$role = 'user';

			$email = (isset($parametersAsArray['email'])) ? $parametersAsArray['email'] : null;
			$name = (isset($parametersAsArray['name'])) ? $parametersAsArray['name'] : null;
			$password = (isset($parametersAsArray['password'])) ? $parametersAsArray['password'] : null;

			$emailConstraint = new Assert\Email();
			$emailConstraint->message = "This email is not valid!";
			$validate_email = $this->get("validator")->validate($email, $emailConstraint);

			if($email != null && count($validate_email)==0 && $password != null && $name != null){

				$user = new User();
				$user->setRole($role);
				$user->setEmail($email);
				$user->setName($name);

				$pwd = hash('sha256',$password);
				$user->setPassword($pwd);

				$em = $this->getDoctrine()->getManager();
				$isset_user = $em->getRepository('AppBundle:User')->findBy(array(
					"email" => $email
				));

				if(count($isset_user)==0){
					$em->persist($user);
					$em->flush();

					$data = array(	
						'data' 	 => $user
					);
				}else{
					$data = array(
						'data'	 => 'User not created !!'
					);
				}
			}

		}

		return $helpers->json($data);
		
	}
}