<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Exception;
use App\Models\Citas\Cita;

class PaymentController extends Controller
{

    public function stripePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->total_a_pagar * 100, // Convertir a centavos
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => route('payment.return'), // Add return URL
            ]);

            if ($paymentIntent->status == 'requires_action' && $paymentIntent->next_action->type == 'use_stripe_sdk') {
                return response()->json([
                    'requires_action' => true,
                    'payment_intent_client_secret' => $paymentIntent->client_secret
                ]);
            } else if ($paymentIntent->status == 'succeeded') {
                // Actualizar el estado de la cita
                $this->actualizarCita($request->cita_id);
                // Añadir mensaje de éxito a la sesión
                session()->flash('success', '¡Cita registrada con éxito!');
                return response()->json(['success' => true]);
            } else {
                return response()->json(['error' => 'Invalid PaymentIntent status']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function payPalPayment(Request $request)
    {
        // PayPal payment logic
        // Update the appointment status
        // $this->actualizarCita($request->cita_id);
    }

    public function bitcoinPayment(Request $request)
    {
        // Lógica para manejar el pago con Coinbase
        // Verificar el pago y actualizar el estado de la cita
        // $this->actualizarCita($request->cita_id);
    }

    public function ethereumPayment(Request $request)
    {
        // Lógica para manejar el pago con Bitcoin/Ethereum
        // Verificar el pago y actualizar el estado de la cita
        // $this->actualizarCita($request->cita_id);
    }

    public function paymentReturn()
    {
        return view('registrar_cita');
    }

    private function actualizarCita($cita_id)
    {
        $cita = Cita::find($cita_id);
        $cita->pagado = 1;
        $cita->save();
    }
}
