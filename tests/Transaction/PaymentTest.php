<?php

namespace Tests;

class PaymentTest extends \PHPUnit\Framework\TestCase
{

    use Configurable;

    public function testPaymentRequestReturnUrl()
    {
        $payment = $this->fakePaymentRequest();

        $result = $payment->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

        $url = parse_url($result);

        $this->assertEquals('https', $url['scheme']);
        $this->assertEquals('sandbox.pagseguro.uol.com.br', $url['host']);
        $this->assertEquals('/v2/checkout/payment.html', $url['path']);
        /**
         * assert equals 1 because preg_match() returns 1 if the pattern matches given subject, 0 if it does not,
         * or FALSE if an error occurred
         * @see http://php.net/manual/pt_BR/function.preg-match.php
         */
        $this->assertEquals(preg_match('/([code]+=+([0-9]*))/i', $url['query']), 1);
    }

    public function testLightboxPaymentRequestReturnCode()
    {

        $payment = $this->fakePaymentRequest();

        $result = $payment->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials(),
            true
        );
        $this->assertInstanceOf('PagSeguro\Parsers\Checkout\Response', $result);
        $this->assertEquals(preg_match('/(([0-9]*))/i', $result->getCode()), 1);
        $this->assertTrue((bool)strtotime($result->getDate()));
    }

    private function fakePaymentRequest()
    {

        $faker = \Faker\Factory::create('pt_BR');

        $payment = new \PagSeguro\Domains\Requests\Payment();

        $payment->addItems()->withParameters(
            '0001',
            'Notebook prata',
            2,
            130.00
        );

        $payment->addItems()->withParameters(
            '0002',
            'Notebook preto',
            2,
            430.00
        );

        $payment->setCurrency("BRL");

        $payment->setExtraAmount(11.5);

        $payment->setReference("LIBPHP000001");

        $payment->setRedirectUrl("http://www.lojamodelo.com.br");

        // Set your customer information.
        $payment->setSender()->setName($faker->name);
        $payment->setSender()->setEmail($faker->email);
        $payment->setSender()->setPhone()->withParameters(
            $faker->areaCode,
            $faker->cellphone(false)
        );
        $payment->setSender()->setDocument()->withParameters(
            'CPF',
            $faker->cpf
        );

        $payment->setShipping()->setAddress()->withParameters(
            $faker->streetName,
            $faker->buildingNumber,
            $faker->streetAddress,
            $faker->postcode,
            $faker->city,
            'SP',
            'BRA',
            $faker->secondaryAddress
        );
        $payment->setShipping()->setCost()->withParameters($faker->randomFloat(2, 1, 100));
        $payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

        //Add items by parameter using an array
        $payment->setRedirectUrl("http://www.lojamodelo.com.br");
        $payment->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");

        return $payment;
    }
}
