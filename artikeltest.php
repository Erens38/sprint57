<?php

use PHPUnit\Framework\TestCase;

class ArtikelTest extends TestCase {
    public function testArtikelenInzien() {
        $artikel = new Artikel();
        $artikelen = $artikel->getAll();
        
        $this->assertIsArray($artikelen);
        $this->assertNotEmpty($artikelen);
    }
}