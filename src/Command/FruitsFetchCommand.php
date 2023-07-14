<?php

namespace App\Command;

use Container5gSN0l1\getFruitsRepositoryService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManager;
use App\Entity\Fruits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'fruits:fetch',
    description: 'fetch fruits',
)]
class FruitsFetchCommand extends Command
{

    public function __construct(
        private HttpClientInterface $client,
        private EntityManagerInterface $em,
        private MailerInterface $mailer,

    ) {
        parent::__construct();
        $this->client = $client;
        $this->em = $em;
        $this->mailer = $mailer;
    }
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $response = $this->client->request(
            'GET',
            'https://fruityvice.com/api/fruit/all'
        );
        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();


        foreach ($content as $apiFruit){
            $fruit = new Fruits();
            $fruit->setName($apiFruit['name']);
            $fruit->setFamily($apiFruit['family']);
            $fruit->setGenus($apiFruit['genus']);
            $fruit->setOrderName($apiFruit['order']);
            $fruit->setFat($apiFruit['nutritions']['fat']);
            $fruit->setSugar($apiFruit['nutritions']['sugar']);
            $fruit->setCarbohydrates($apiFruit['nutritions']['carbohydrates']);
            $fruit->setProtein($apiFruit['nutritions']['protein']);
            $fruit->setCalories($apiFruit['nutritions']['calories']);

            $this->em->persist($fruit);

        }
        $this->em->flush();

        $email = (new Email())
            ->from('fromemail@email.com')
            ->to('toemail@email.com')
            ->subject('Success!')
            ->text('Confirmation of fruits saving in db')
            ->html('Confirmation of fruits saving in db');

        $this->mailer->send($email);
        $io->success('All fruits are save successfully');

        return Command::SUCCESS;
    }

    private function getFruits(){
        $response = $this->client->request(
            'GET',
            'https://fruityvice.com/api/fruit/all'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}
