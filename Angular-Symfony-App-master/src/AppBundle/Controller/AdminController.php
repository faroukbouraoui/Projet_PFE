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
use AppBundle\Entity\Produit;
use FOS\RestBundle\Controller\FOSRestController;
use Doctrine\ORM\EntityRepository;
use Doctrine\DBAL\Schema\View;
use AppBundle\Entity\Categorie;
use AppBundle\Entity\Fournisseur;


 

class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }
    
    

    public function listeproduitsAction()
    {

        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $produits   = $em->getRepository('AppBundle:Produit')->findAll();

        $data = $serializer->serialize($produits,'json');
        return new Response($data);        
    }
    public function listecomptesAction()
    {

        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $comptes   = $em->getRepository('AppBundle:Compte')->findAll();

        $data = $serializer->serialize($comptes,'json');
        return new Response($data);        
    }
    public function listecommandesAction()
    {
        $serializer = $this->get('jms_serializer');
    
        $em = $this->getDoctrine()->getEntityManager();
        $commandes   = $em->getRepository('AppBundle:Commande')->findAll();

        $data = $serializer->serialize($commandes,'json');
        return new Response($data);        
    }

   
    public function ajoutAction(Request $request){

        
        
        $produit=new Produit;


       // $idP =$request->get('id');
        $designation =$request->get('designation');
        $description =$request->get('description');
        $image =$request->get('image');
        $prix =$request->get('prix');
        $idCat=$request->get('categorie');
        $fournisseur =$request->get('fournisseur');

        $f = $this->getDoctrine()->getRepository('AppBundle:Fournisseur')->findOneById($fournisseur);
        $c = $this->getDoctrine()->getRepository('AppBundle:Categorie')->findOneById($idCat);


        $produit->setDesignation($designation);
        $produit->setDescription($description);
        $produit->setImage($image);
        $produit->setPrix($prix);
        //$produit->setId($idP);


        $produit->setCategorie($c);
        $produit->setFournisseur($f);


        $em=$this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();
        return new JsonResponse(array(
            'message' => "succ",
            'code' => "2"
        ), 200);
        
        

}

    public function update_produitAction(Request $request)
    {
        $idP =$request->get('id');
        $designation =$request->get('designation');
        $description =$request->get('description');
        $image =$request->get('image');
        $prix =$request->get('prix');
        $idCat=$request->get('categorie');
        $fournisseur =$request->get('fournisseur');
         
        $f = $this->getDoctrine()->getRepository('AppBundle:Fournisseur')->findOneById($fournisseur);
        $c = $this->getDoctrine()->getRepository('AppBundle:Categorie')->findOneById($idCat);
        $produit=$this->getDoctrine()->getRepository('AppBundle:Produit')->findOneById($idP);


    if(!empty($designation)){
        $produit->setDesignation($designation);
    }
    if(!empty($description)){
        $produit->setDescription($description);
    }
    if(!empty($image)){
        $produit->setImage($image);
    }
    if(!empty($prix)){
        $produit->setPrix($prix);
    }
    if(!empty($fournisseur)){
        $produit->setFournisseur($f);
    }
    if(!empty($idCat)){
        $produit->setCategorie($c);
    }
    
    $em=$this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();
        return new JsonResponse(array(
            'message' => "succ",
            'code' => "2"
        ), 200);
}
public function delete_produitAction(Request $request)
    {
        $idP =$request->get('id');
        $produit=$this->getDoctrine()->getRepository('AppBundle:Produit')->findOneById($idP);
        if(empty($produit)){
            return new JsonResponse(array(
                'message' => "del erreur",
                'code' => "2"
            ), 200);
        }else{
            $em=$this->getDoctrine()->getManager();
            $em->remove($produit);
            $em->flush();
            
        }
        return new JsonResponse(array(
            'message' => "del succ",
            'code' => "2"
        ), 200);
    }  
    
    public function getproduit_commandeAction($id)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $commande = $em->getRepository('AppBundle:Commande')->find($id);
        $produits= $commande->getProduit();
    
        $data = $serializer->serialize($produits,'json');
        return new Response($data);

    }    

    public function getproduit_devisAction($id)
    {
        $serializer = $this->get('jms_serializer');
        $em = $this->getDoctrine()->getEntityManager();
        $devis = $em->getRepository('AppBundle:Devis')->find($id);
        $produits= $devis->getProduit();
    
        $data = $serializer->serialize($produits,'json');
        return new Response($data);

    } 
    public function delete_compteAction(Request $request)
    {
        $idC =$request->get('id');
        $compte=$this->getDoctrine()->getRepository('AppBundle:Compte')->findOneById($idC);
        if(empty($compte)){
            return new JsonResponse(array(
                'message' => "del erreur",
                'code' => "2"
            ), 200);
        }else{
            $em=$this->getDoctrine()->getManager();
            $em->remove($compte);
            $em->flush();
            
        }
        return new JsonResponse(array(
            'message' => "del succ",
            'code' => "2"
        ), 200);
    } 

} 
