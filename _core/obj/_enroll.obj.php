<?php

use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;

class _enroll extends _obj
{
    public function __construct()
    {
        parent::__construct('_enroll');
        Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));
    }

    /**
     * Handles enrollment and payment process.
     *
     * @param array $data
     * @return array
     */
    public function handleEnrollment(array $data): array
    {
        $sub_plan = new _sub_plan();
        $plan_data = $sub_plan->get_by_id($data['plan_id']);
        if (!$plan_data) {
            return ['success' => false, 'message' => 'Invalid subscription plan'];
        }

        $amount = intval(floatval($plan_data['_sub_plan_mth_price']) * 100);

        $payment_result = $this->processPayment($data['payment'], $data['mem_email'], $amount);
        if (!$payment_result['success']) {
            return ['success' => false, 'message' => 'Payment failed: ' . $payment_result['message']];
        }

        $saved = $this->saveEnrollment($data, $payment_result['charge_id']);
        if (!$saved) {
            return ['success' => false, 'message' => 'Failed to save enrollment'];
        }

        return ['success' => true];
    }

    /**
     * Processes payment using Stripe.
     *
     * @param array $payment
     * @param string $email
     * @param int $amount
     * @return array
     */
    public function processPayment(array $payment, string $email, int $amount): array
    {
        try {
            $token = Token::create([
                'card' => [
                    'number' => $payment['cc_number'],
                    'exp_month' => explode('/', $payment['expiration'])[0],
                    'exp_year' => explode('/', $payment['expiration'])[1],
                    'cvc' => $payment['cvv']
                    ]
                ]);

            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => 'tok_visa',             //TODO: Use token here on live
                'description' => 'Enrollment Payment for ' . $email
            ]);

            return ['success' => true, 'charge_id' => $charge->id];
        } catch (\Stripe\Exception\CardException $e) {
            return ['success' => false, 'message' => 'Payment failed: ' . $e->getMessage()];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Unexpected error: ' . $e->getMessage()];
        }
    }

    /**
     * Saves enrollment and payment details to the database.
     *
     * @param array $data
     * @param string $charge_id
     * @return bool
     */
    public function saveEnrollment(array $data, string $charge_id): bool
    {
        //TODO: It must be implemented as we store in the database
        $paymentData = [
            'mem_email' => $data['mem_email'],
            'plan_id' => $data['plan_id'],
            'charge_id' => $charge_id,
            'amount' => intval(floatval($data['_sub_plan_mth_price']) * 100),
            'payment_status' => 'completed',
            'created_at' => date('Y-m-d H:i:s')
        ];

        return true; 
    }
}
