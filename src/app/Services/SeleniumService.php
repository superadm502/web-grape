<?php

namespace App\Services;

use App\Models\DayHour;
use App\Models\LoginUfsc;
use App\Models\UserWeekDay;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Exception\WebDriverException;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverSelect;

class SeleniumService
{
    public function loginUfsc(UserWeekDay $userWeekDay, LoginUfsc $loginUfsc)
    {
        $key = base64_decode(env('PASSWORD_KEY'));
        $nonce = base64_decode(env('PASSWORD_NONCE'));
        $decoded = base64_decode($loginUfsc->password);
        $nonce = mb_substr($decoded, 0, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, '8bit');
        $encrypted_result = mb_substr($decoded, SODIUM_CRYPTO_SECRETBOX_NONCEBYTES, null, '8bit');
        $password_decrypted = sodium_crypto_secretbox_open($encrypted_result, $nonce, $key);
        
        
        $serverUrl = env('SELENIUM_URL');
        $driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());
        $driver->get('https://sgpru.sistemas.ufsc.br/agendamento/home.xhtml');

        try {
            $driver->findElement(WebDriverBy::id('username'))->sendKeys($loginUfsc->enrollment);
            $driver->findElement(WebDriverBy::id('password'))->sendKeys($password_decrypted);
            sleep(2);
            $button = $driver->findElement(
                WebDriverBy::name('submit')
            );
            $button->click();
            // $redirect = $driver->findElement(WebDriverBy::name('j_id20:j_id21'));
            // $redirect->click();
            if($userWeekDay->launch)
                $this->agendar($driver, 'Almoço', DayHour::find($userWeekDay->launch_hour_id)->hour ?? '11:00');
            if($userWeekDay->dinner)
                $this->agendar($driver, 'Jantar', DayHour::find($userWeekDay->dinner_hour_id)->hour ?? '17:00');
        } catch (\Throwable $th) {
            $driver->quit();
        }
         
        $driver->quit();
    }

    private function agendar($driver, string $type, string $hour){
        $agendarMenu = $driver->findElement(WebDriverBy::linkText('Agendar refeição'));
        $agendarMenu->click();
        
        sleep(1);
        
        $refRef = $driver->findElement(WebDriverBy::name('agendamentoForm:refeicao'));
        $selectElement = new WebDriverSelect($refRef);
        $selectElement->selectByVisibleText($type);
        sleep(1);

        $refData = $driver->findElement(WebDriverBy::name('agendamentoForm:dtRefeicao'));
        $selectElement2 = new WebDriverSelect($refData);
        $date = date('d/m/Y');
        // $date = date('d/m/Y', strtotime( "+1 days" ));
        $selectElement2->selectByValue($date);
        sleep(1);

        $refHours = $driver->findElement(WebDriverBy::name('agendamentoForm:hrRefeicao'));
        $selectElement3 = new WebDriverSelect($refHours);
        try {
            $selectElement3->selectByValue($hour);
        } catch (\Throwable $th) {
            $selectElement3->selectByIndex(1);
        }
        
        $driver->findElement(WebDriverBy::name('agendamentoForm:j_idt93'))->click();
        
        sleep(2);
    }
}
