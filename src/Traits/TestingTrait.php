<?php

namespace Elattar\Prepare\Traits;

trait TestingTrait
{
    public function getSignUpData(string $WantToTest = null, string $Against = ''): array
    {
        $data = [
            'username' => 'Aa2302',
            'full_name' => 'TestName',
            'password' => 'Aa234!#!1',
            'password_confirmation' => 'Aa234!#!1',
            'phone' => '123123',
            'role' => '8',
        ];
        if ($WantToTest) {
            $data[$WantToTest] = $Against;
        }

        return $data;
    }

    public function getOfferData(string $WantToTest = null, string $Against = ''): array
    {

        $data = [
            'product_id' => null,
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d', strtotime('+'.rand(1, 100).'Days')),
            'pay_method_id' => '1',
        ];
        if ($WantToTest) {
            $data[$WantToTest] = $Against;
        }

        return $data;
    }

    public function getProductsData(string $WantToTest = null, string $Against = '')
    {
        $data = json_decode('{
            "commercial_name" : "TestCommercialName",
            "scientific_name" : "TestScientificName",
            "quantity" : "1",
            "purchase_price":"1.001023123",
            "selling_price":"1",
            "bonus" : "1",
            "concentrate" : "2",
            "patch_number" :"1-1-1-1",
            "limited" : true,
            "entry_date" : "2020-12-11",
            "expire_date" : "2023-12-12",
            "barcode" : "23021977"
        }', true);

        if ($WantToTest) {
            $data[$WantToTest] = $Against;
        }

        return $data;
    }

    /**
     * Set Token For Testing Phase.
     */
    public function setToken(string $token): void
    {
        if (config('test.store_response')) {
            if (! is_dir(__DIR__.'/../../tests/responsesExamples/Auth')) {
                mkdir(__DIR__.'/../../tests/responsesExamples/Auth', recursive: true);
            }
            $handle = fopen(__DIR__.'/../../tests/responsesExamples/Auth/token.txt', 'w');
            fwrite($handle, $token);
            fclose($handle);
        }
    }

    /**
     * Get Token For Testing.
     */
    public function getToken(): string
    {
        return file_get_contents(__DIR__.'/../../tests/responsesExamples/Auth/token.txt');
    }
}
