<?php

namespace Davidnadejdin\LaravelRobokassa;

use Idma\Robokassa\Payment;

class LaravelRobokassaClass
{
    /**
     * @param $invoiceId
     * @param $amount
     * @param $description
     * @return \Idma\Robokassa\Payment
     * @throws \Idma\Robokassa\Exception\InvalidSumException
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
     * @return bool
     */
    public function validateResult($data, $sum): bool
    {
        $payment = new Payment(
            config('robokassa.login'), config('robokassa.password'), config('robokassa.password2'),
            config('robokassa.test_mode'));

        if ($payment->validateResult($data)) {
            if ($payment->getSum() == $sum) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $data
     * @param $sum
     * @return bool
     */
    public function validateSuccess($data, $sum): bool
    {
        $payment = new Payment(
            config('robokassa.login'), config('robokassa.password'), config('robokassa.password2'),
            config('robokassa.test_mode')
        );

        if ($payment->validateSuccess($data)) {
            if ($payment->getSum() == $sum) {
                return true;
            }
        }

        return false;
    }
}