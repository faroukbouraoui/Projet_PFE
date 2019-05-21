<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Services\Helpers;
use AppBundle\Services\JwtAuth;


class UserclassController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }




    public function categoriesAction()
    {
        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $categories   = $em->getRepository('AppBundle:Categorie')->findAll();

        $data = $serializer->serialize($categories,'json');
        return new Response($data);        
    }

    
    public function produitsAction()
    {

        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $produits   = $em->getRepository('AppBundle:Produit')->findAll();

        $data = $serializer->serialize($produits,'json');
        return new Response($data);        
    }

    public function partenairesAction()
    {

        $serializer = $this->get('jms_serializer');

        $em=$this->getDoctrine()->getEntityManager();
        $partenaires = $em->getRepository('AppBundle:Partenaire')->findAll();
        $data = $serializer->serialize($partenaires,'json');
        return new Response($data);

    }

    public function fournisseurAction()
    {
        $serializer = $this->get('jms_serializer');

        $em = $this->getDoctrine()->getEntityManager();
        $fournisseurs=$em->getRepository('AppBundle:Fournisseur')->findAll();
        $data=$serializer->serialize($fournisseurs,'json');
        return new Response($data);

    
    }
    public function getproduits_fournisseurAction(Request $request)

    {   
        $id=$request->request->get('id');
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $fournisseur = $em->getRepository('AppBundle:Fournisseur')->findOneBy([
            'id'=>$id
        ]);
        $produits= $fournisseur->getProduit();
    
        $data = $serializer->serialize($produits,'json');
        return new Response($data);

    }

    public function getfournisseur_produitsAction($id)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $produits = $em->getRepository('AppBundle:Produit')->find($id);
        $fournisseur = $produits->getFournisseur();
    
        $data = $serializer->serialize($fournisseur,'json');
        return new Response($data);
       
    }


    public function getproduits_categorieAction($id)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $categorie = $em->getRepository('AppBundle:Categorie')->find($id);
        $produits = $categorie->getProduit();
    
        $data = $serializer->serialize($produits,'json');
        return new Response($data);
    }

    public function getcategorie_produitsAction($id)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $produits = $em->getRepository('AppBundle:Produit')->find($id);
        $categorie = $produits->getCategorie();
    
        $data = $serializer->serialize($categorie,'json');
        return new Response($data);
       
    }

    public function commandesAction()
    {
        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $commandes   = $em->getRepository('AppBundle:Commande')->findAll();

        $data = $serializer->serialize($commandes,'json');
        return new Response($data);        
    }

    public function getproduits_commandeAction($id)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $commande = $em->getRepository('AppBundle:Commande')->find($id);
        $produits= $commande->getProduit();
    
        $data = $serializer->serialize($produits,'json');
        return new Response($data);

    }

   /* public function mailAction(Request $request){


        $em=$this->getDoctrine()->getManager();
            $membre=$em->getRepository('AppBundle:User')->findOneBy(array('email' => $email));
            $commecial="faroukbr050@gmail.com";
            $message = (new \Swift_Message('Hello Email'))
            ->setFrom($membre)
            ->setTo($commecial)

            return new JsonResponse(array(
                'message' => "mail reçue",
                'code' => "2"
            ), 200);

   }*/

   public function produit_categAction()
    {

        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $categorie   = $em->getRepository('AppBundle:Categorie')->findOneBy(array('nomCategorie' => $nomCategorie));
        
        $data = $serializer->serialize($produits,'json');
        return new Response($data);        
    }

    public function ajout_commandeAction(Request $request){

        
        
        $commande=new Commande;


       // $idP =$request->get('id');
        $dateCommande =$request->get('date_commande');
        $centreLivraison =$request->get('centre_livraison');
        $total =$request->get('total');
        $user=$request->get('user');
        $produit =$request->get('fournisseur');

        $u = $this->getDoctrine()->getRepository('AppBundle:User')->findOneById($user);
        $p = $this->getDoctrine()->getRepository('AppBundle:Produit')->findOneById($produit);


        $commande->setDateCommande($dateCommande);
        $commande->setCentreLivraison($centreLivraison);
        $commande->setTotal($total);
        
        //$produit->setId($idP);


        $commande->setUser($u);
        $commande->setProduit($p);


        $em=$this->getDoctrine()->getManager();
        $em->persist($commande);
        $em->flush();
        return new JsonResponse(array(
            'message' => "succ",
            'code' => "2"
        ), 200);
        
        

}
public function update_produitAction(Request $request)
{
    
        $dateCommande =$request->get('date_commande');
        $centreLivraison =$request->get('centre_livraison');
        $total =$request->get('total');
        $user=$request->get('user');
        $produit =$request->get('fournisseur');

        $u = $this->getDoctrine()->getRepository('AppBundle:User')->findOneById($user);
        $p = $this->getDoctrine()->getRepository('AppBundle:Produit')->findOneById($produit);
    


if(!empty($dateCommande)){
    $commande->setDateLivraison($dateCommande);
}
if(!empty($centreLivraison)){
    $commande->setCentreLivraison($centreLivraison);
}
if(!empty($total)){
    $commande->setTotal($total);
}

if(!empty($user)){
    $commande->setUser($u);
}
if(!empty($produit)){
    $commande->setProduit($p);
}

$em=$this->getDoctrine()->getManager();
    $em->persist($commande);
    $em->flush();
    return new JsonResponse(array(
        'message' => "succ",
        'code' => "2"
    ), 200);
}
public function delete_produitAction(Request $request)
    {
        $idC =$request->get('id');
        $commande=$this->getDoctrine()->getRepository('AppBundle:Commande')->findOneById($idC);
        if(empty($commande)){
            return new JsonResponse(array(
                'message' => "del erreur",
                'code' => "2"
            ), 200);
        }else{
            $em=$this->getDoctrine()->getManager();
            $em->remove($commande);
            $em->flush();
            
        }
        return new JsonResponse(array(
            'message' => "del succ",
            'code' => "2"
        ), 200);
    }

}
