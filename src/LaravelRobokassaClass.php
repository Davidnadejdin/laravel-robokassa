<?php

namespace Davidnadejdin\LaravelRobokassa;

use Idma\Robokassa\Payment;

class LaravelRobokassaClass
{
    /**
     * @param $invoiceId
     * @param $amount
     * @param $description
     *
     * @throws \Idma\Robokassa\Exception\InvalidSumException
     *
     * @return \Idma\Robokassa\Payment
     */
    public function createPayment($invoiceId, $amount, $description): Payment
    {
        $payment = new Payment(
            config('robokassa.login'), config('robokassa.password'), config('robokassa.password2'),
            config('robokassa.test_mode')
        );
        $payment
            ->setInvoiceId($invoiceId)
            ->setSum($amount)
            ->setDescription($description);

        return $payment;
    }

    /**
     * @param $data
     * @param $sum
     *
     * @return bool
     */
    public function validateResult($data, $sum): bool
    {
        $payment = new Payment(
            config('robokassa.login'), config('robokassa.password'), config('robokassa.password2'),
            config('robokassa.test_mode'));

        return $payment->validateResult($data) && $payment->getSum() === $sum;
    }

    /**
     * @param $data
     * @param $sum
     *
     * @return bool
     */
    public function validateSuccess($data, $sum): bool
    {
        $payment = new Payment(
            config('robokassa.login'), config('robokassa.password'), config('robokassa.password2'),
            config('robokassa.test_mode')
        );

        return $payment->validateSuccess($data) && $payment->getSum() === $sum;
    }
}
