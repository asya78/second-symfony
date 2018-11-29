<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/test", name="homepage")
     */
    public function testAction(Request $request)
    {
        // replace this example code with whatever you need
        $user = new User();

        $user->setName('Ivan');

        $form = $this->createFormBuilder($user)
            ->add('id', NumberType::class)
            ->add('name', TextType::class)
            ->add('age', NumberType::class)
            ->add('description', TextareaType::class)
            ->add('createDate', DateTimeType::class,['widget'=>'single_text'])
            ->add('cityId',ChoiceType::class,['choices'=>['Sofia'=>'sof','Plovdiv'=>'plo']])
            ->add('countryId', CountryType::class)
            ->add('save',SubmitType::class)
            ->getForm();

        $form -> handleRequest($request);

        if($form->isSubmitted()) {

            dump($form->getData());

        }

        return $this->render('default/test.html.twig', ['myForm'=>$form->createView()]);
    }

    /**
     * @Route("/orm")
     */
    public function orm(){

        $product = new Product();

        $product->setName('Coca Cola'.rand(1,1000));

        $product->setPrice('2.30');

        $product->setDescription('Cool drink!');

        $product->setCreateDate(new \DateTime());

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);

        $em->flush();

        return $this->render('default/orm.html.twig',['product'=>$product]);
    }

    /**
     * @Route("/orm_get")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function orm_get(){

        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findByNameAndPrice();

        return $this->render('default/orm.html.twig',['product'=>$product]);


    }

    /**
     * @Route("/orm_update")
     */
    public function orm_update(){

        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find(4);

        $product->setName('New new 99');

        $em = $this->getDoctrine()->getManager();

        $em->flush();

        return $this->render('default/orm.html.twig',['product'=>$product]);

    }

    /**
     * @Route("/orm_delete")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function orm_delete(){

        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find(6);

        if (!$product) {

            throw $this->createNotFoundException('Product not found.');

        }

        $em = $this->getDoctrine()->getManager();

        $em->remove($product);

        $em->flush();

        return $this->render('default/orm.html.twig',['product'=>$product]);

    }




}
