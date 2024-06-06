<?php

use PHPUnit\Framework\TestCase;

class VerkooporderTest extends TestCase {
    public function testArtikelenInVerkooporderPlaatsen() {
        $verkooporder = new Verkooporder();
        $verkooporder->create(['datum' => '2024-06-04', 'klant_id' => 1]);
        
        $result = $verkooporder->addArtikel(1, 2); // Artikel ID 1, Aantal 2
        
        $this->assertTrue($result);
    }
}