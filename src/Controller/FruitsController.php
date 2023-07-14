<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Fruits;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\DBAL\Query\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FruitsRepository;

class FruitsController extends AbstractController
{


    public function __construct(
        private HttpClientInterface $client,
        private  MailerInterface $mailer,
        private EntityManagerInterface $em,

    ) {
        $this->client = $client;
        $this->mailer = $mailer;
        $this->em = $em;

    }
    #[Route('/', name: 'app_fruits')]
    public function index(Request $request,PaginatorInterface $paginator , FruitsRepository $fruitsRepository)
    {
        $fruits = $fruitsRepository
            ->findAll();

        return $this->render('fruits/index.html.twig', [
            'fruits' => $fruits
        ]);
    }

    #[Route('/send', name: 'sendEmail')]
 
}
