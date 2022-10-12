<?php
namespace App\Traits;

trait GeneralTrait
{
    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    private function apiResponse()
    {
        return response()->json([

        ]);
    }


}
