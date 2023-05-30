<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClothesController extends AbstractController
{
    #[Route('/clothes', name: 'app_clothes')]
    public function index(): Response
    {   $clothes=[['name'=>'MUGLER Alien','image'=>'assets/img/p2.jpg','price'=>'26,50 €','lien'=>'https://www.tendance-parfums.com/thierry-mugler-alien-eau-parfum.html'],
        ['name'=>'YVES SAINT ','image'=>'assets/img/libre-eau-de-parfum-yves-saint-laurent-50-ml_1.jpg','price'=>'52,50 €','lien'=>'https://www.tendance-parfums.com/la-nuit-tresor-fleur-de-nuit.html'],
        ['name'=>'La Vie est Belle','image'=>'assets/img/p4.jpg','price'=>'33,50 €','lien'=>'https://www.tendance-parfums.com/lancome-la-vie-est-belle.html'],
        ['name'=>'GUCCI Flora Gorgeous Gardenia','image'=>'assets/img/p1.jpg','price'=>'33,50 €','lien'=>'https://www.tendance-parfums.com/gucci-flora-gorgeous-gardenia.html'],
        ['name'=>'ZADIG & VOLTAIRE','image'=>'assets/img/375x500.72698.jpg','price'=>'41,50 €','lien'=>'https://www.tendance-parfums.com/very-good-girl.html'],
        ['name'=>'ZADIG & VOLTAIRE','image'=>'assets/img/375x500.72698.jpg','price'=>'41,50 €','lien'=>'https://www.tendance-parfums.com/very-good-girl.html'],
      
        
    ];
    
        return $this->render('clothes/index.html.twig', [
            'controller_name' => 'ClothesController',
            'clothes'=>$clothes,
        ]);
    }
}
