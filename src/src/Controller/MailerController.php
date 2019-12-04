<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/mailer", name="mailer")
     */
    public function index(MailerInterface $mailer)
    {
        $body = <<<EOL
https://symfony.com/why-use-a-framework

フレームワークを使用する必要があるのはなぜですか？
フレームワークは絶対に必要というわけではありません。それは、あなたがより良く、より速く開発するのを助けるために利用できるツールの「ちょうど」1つです！

フレームワークは、ビジネスルールに完全に準拠し、構造化され、メンテナンスとアップグレードの両方が可能なアプリケーションを開発しているという確実性を提供するためです。

開発者が汎用モジュールを再利用して他の領域に集中することで時間を節約できるため、より高速です。ただし、フレームワーク自体に縛られることはありません。

テクノロジーではなくタスクに投資する
これがフレームワークの基本原則です。車輪を再発明する必要はありません。そして、ビジネスルールに完全に焦点を合わせるために、予見されない低価値のタスク（たとえば、汎用コンポーネントの開発）を廃止します。

例として、フレームワークを使用すると、開発者が認証フォーム（特定のタスクではない）を作成するのに2〜3日費やす必要がなくなります。節約される時間は、より具体的なコンポーネントだけでなく、対応する単体テストにも使用できます。堅牢で持続可能かつ高品質のコードを提供します。

アップグレード性とメンテナンスを保証
長期的には、フレームワークはアプリケーションの寿命を保証します。開発チームが希望どおりに動作する場合、その特定のチームのみがアプリケーションを簡単に維持およびアップグレードできます。出版社が独自のソリューションをサポートする方法。

一方、フレームワークがアプリケーションに提供する構造は、この落とし穴を完全に回避することを可能にし、開発者が開発に参加したかどうかに関係なく、アプリケーションを簡単に「採用」し、それを維持する機能を提供します必要に応じて、時間をかけて迅速かつきれいにアップグレードします。

この点で、フレームワークはブラックボックスではありません！Symfonyの場合、それはまだPHPです...開発されるアプリケーションはSymfonyユニバースに限定されず、たとえば他のPHPライブラリとネイティブに相互運用できます。
EOL;


        $email = (new Email())
            ->from(new Address('hello@example.com', '送信者名'))
            ->to(new Address('you@example.com', '受信者名'))
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('日本語のサブジェクトになります。長くなると文字化けするという話もありますので、長く書いてみます。これぐらい長いとどうかな？')
            ->text($body)
//            ->html('<p>See Twig integration for better HTML integration!</p>')
        ;

        $mailer->send($email);

        return $this->render('mailer/index.html.twig', [
            'controller_name' => 'MailerController',
        ]);
    }
}
