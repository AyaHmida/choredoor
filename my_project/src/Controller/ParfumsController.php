<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Parfums;
use App\Form\ParfumsType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ContactRepository;
use App\Repository\ParfumsRepository;
use Symfony\Component\Validator\Constraints\File;

class ParfumsController extends AbstractController
{
    #[Route('/parfums', name: 'app_parfums')]
    public function new(Request $request, SluggerInterface $slugger,EntityManagerInterface $em,ContactRepository $rep): Response
    {
        $parfums = new Parfums();
        $form = $this->createForm(ParfumsType::class, $parfums);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('photo')->getData();
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
                try {
                    $brochureFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $parfums->setPhoto($newFilename);
            }           
            $em->persist($parfums);
            $em->flush();
            return $this->redirectToRoute('app_parfums_list');

            


        }

        return $this->render('parfums/index.html.twig', [
            'form' => $form,
        ]);
    }
    #[Route('/parfums/list', name: 'app_parfums_list')]
    public function list(Request $request, SluggerInterface $slugger,ParfumsRepository $mr): Response
    {   $parfums=$mr->findAll();
        return $this->render('parfums/list.html.twig', [
            'parfums' => $parfums,
        ]);
    }
    #[Route('/parfums/delete/{id}', name: 'delete_parfums')]
    public function delete(Parfums $parfums,EntityManagerInterface $m): Response
    {   if ($parfums)
        {
            $m->remove($parfums);
            $m->flush();
            $this->addFlash('sucess','your parfums was deleted sucessfully');
        }
        return $this->redirectToRoute('app_parfums_list');
    }
  
    #[Route('/parfums/show/{id}', name:"parfums_show")]

    public function show(Parfums $parfums): Response
    {
        return $this->render('parfums/show.html.twig', [
            'parfums' => $parfums,
        ]);
    }
    








    
    
}
