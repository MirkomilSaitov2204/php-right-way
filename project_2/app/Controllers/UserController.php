<?php

declare(strict_types=1);

namespace Domain\Controllers;

use Domain\Attributes\Get;
use Domain\Attributes\Post;
use Domain\Attributes\Put;
use Domain\Models\Email;
use Domain\View;
use Domain\Services\InvoiceService;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;

class UserController
{


    public function __construct(protected MailerInterface $mailer)
    {
    }

    #[Get('/users/create')]
    public function index(): View
    {
        return View::make('users/create');
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Post('/users')]
    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $firstName = explode(' ',  $name)[0];

        $text = "Hello $firstName";

        (new Email())->queue(
            new Address($email),
            new Address('support@example.com', 'Support'),
            'Welcome!', $text, $text
        );
        $this->mailer->send($email);
    }

    #[Put('/', 'put')]
    public function update()
    {

    }
}