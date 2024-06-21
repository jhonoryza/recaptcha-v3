<?php

namespace Jhonoryza\RecaptchaV3;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $endpoint = config('recaptcha-v3.google_recaptcha');
        $minScore = config('recaptcha-v3.min_score');

        $response = Http::asForm()
            ->post($endpoint['url'], [
                'secret' => $endpoint['secret_key'],
                'response' => $value,
            ])
            ->onError(function (ConnectionException $exception) use ($fail) {
                $fail($exception->getMessage());
            })
            ->json();

        if ($response['success'] && $response['score'] > $minScore) {
            return;
        } elseif ($response['success'] && $response['score'] <= $minScore) {
            $fail('The score must be greater than '.$minScore);
        }

        $fail($this->message());
    }

    protected function message(): string
    {
        return 'Something goes wrong. Please contact us directly through the phone or email.';
    }

}