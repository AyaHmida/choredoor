<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MenberType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ContactRepository;
use App\Repository\MemberRepository;

class MemberController extends AbstractController
{
    #[Route('/member', name: 'app_member')]
    public function new(Request $request, SluggerInterface $slugger,EntityManagerInterface $em,ContactRepository $rep): Response
    {
        $member = new Member();
        $form = $this->createForm(MenberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('photo')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $member->setPhoto($newFilename);
            }
           
            $em->persist($member);
            $em->flush();
            

            return $this->redirectToRoute('app_member_list');

            

            // ... persist the $product variable or any other work

        }

        return $this->render('member/index.html.twig', [
            'form' => $form,
        ]);
    }
    #[Route('/member/list', name: 'app_member_list')]
    public function list(Request $request, SluggerInterface $slugger,MemberRepository $mr): Response
    {   $member=$mr->findAll();
        return $this->render('member/list.html.twig', [
            'member' => $member,
        ]);
    }
    #[Route('/member/delete/{id}', name: 'delete_member')]
    public function delete(Member $member,EntityManagerInterface $m): Response
    {   if ($member)
        {
            $m->remove($member);
            $m->flush();
            $this->addFlash('sucess','your member was deleted sucessfully');
        }
        return $this->redirectToRoute('app_member_list');
    }
    #[Route('/member/vue/{id}', name: 'app_member_vue')]
    public function vue(int $id, MemberRepository $mr): Response
    {   
        $member = $mr->find($id);
        
        return $this->render('member/vue.html.twig', [
            'member' => $member,
        ]);
    }
    
   
}
