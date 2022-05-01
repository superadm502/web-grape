<?php

namespace App\Services;

use App\Models\LoginUfsc;
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
    public function loginUfsc(LoginUfsc $model)
    {
        $serverUrl = 'http://34.116.158.176:8080/wd/hub';
        $driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());
        $driver->get('https://sgpru.sistemas.ufsc.br/agendamento/home.xhtml');

        $driver->findElement(WebDriverBy::id('username'))->sendKeys($model->enrollment);
        $driver->findElement(WebDriverBy::id('password'))->sendKeys($model->password);
        sleep(3);
        $button = $driver->findElement(
            WebDriverBy::name('submit')
        );
        $button->click();

        $redirect = $driver->findElement(WebDriverBy::name('j_id20:j_id21'));
        $redirect->click();

        $this->agendar($driver, 'Almoço');
        $this->agendar($driver, 'Jantar');
        $driver->quit();
    }

    private function agendar($driver, string $type){
        $agendarMenu = $driver->findElement(WebDriverBy::linkText('Agendar refeição'));
        $agendarMenu->click();
        
        sleep(1);
        
        $refData = $driver->findElement(WebDriverBy::name('agendamentoForm:refeicao'));
        $selectElement = new WebDriverSelect($refData);
        $selectElement->selectByVisibleText($type);
        
        $driver->findElement(WebDriverBy::name('agendamentoForm:j_idt93'))->click();
        
        sleep(3);
    }
}
