<?php

namespace App\Services\Autocomplete\Traits;

trait HasBanks {

    private $banks = [
        '33' => [
            'name' => 'ADDIKO BANK D.D.',
            'address' => 'Dunajska 117, 1000 Ljubljana',
            'BIC' => 'HAABSI22'
        ], 
        '10' => [
            'name' => 'BANKA INTESA SANPAOLO D.D.',
            'address' => 'Pristaniška 14, 6502 Koper',
            'BIC' => 'BAKOSI2X'
        ], 
        '01' => [
            'name' => 'BANKA SLOVENIJE',
            'address' => 'Slovenska 35, 1505 Ljubljana',
            'BIC' => 'BSLJSI2X'
        ], 
        '34' => [
            'name' => 'BANKA SPARKASSE D.D.',
            'address' => 'Cesta v Kleče 15, 1000 Ljubljana',
            'BIC' => 'KSPKSI22'
        ], 
        '35' => [
            'name' => 'BKS BANKA AG, BANČNA PODRUŽNICA',
            'address' => 'Dunajska cesta 161, 1000 Ljubljana',
            'BIC' => 'BFKKSI22'
        ], 
        '61' => [
            'name' => 'DELAVSKA HRANILNICA D.D. LJUBLJANA',
            'address' => 'Miklošičeva 5, 1000 Ljubljana',
            'BIC' => 'HDELSI22'
        ], 
        '19' => [
            'name' => 'DEŽELNA BANKA SLOVENIJE D.D.',
            'address' => 'Kolodvorska 9, 1000 Ljubljana',
            'BIC' => 'SZKBSI2X'
        ], 
        '07' => [
            'name' => 'GORENJSKA BANKA D.D., KRANJ',
            'address' => 'Bleiweisova 1, 4000 Kranj',
            'BIC' => 'GORESI2X'
        ], 
        '60' => [
            'name' => 'HRANILNICA LON D.D., KRANJ',
            'address' => 'Žanova ulica 3, 4000 Kranj',
            'HLONSI22'
        ], 
        '04' => [
            'name' => 'NOVA KREDITNA BANKA MARIBOR D.D.',
            'address' => 'Ulica Vita Kraigherja 4, 2505 Maribor',
            'BIC' => 'KBMASI2XKBMASI2X'
        ], 
        '05' => [
            'name' => 'NOVA KREDITNA BANKA MARIBOR D.D.',
            'address' => 'Ulica Vita Kraigherja 4, 2505 Maribor',
            'BIC' => 'KBMASI2X'
        ], 
        '02' => [
            'name' => 'NOVA LJUBLJANSKA BANKA D.D., LJUBLJANA',
            'address' => 'Trg republike 2, 1520 Ljubljana',
            'BIC' => 'LJBASI2X'
        ], 
        '64' => [
            'name' => 'PRIMORSKA HRANILNICA VIPAVA D.D.',
            'address' => 'Glavni trg 15, 5271 Vipava',
            'BIC' => 'HKVISI22'
        ], 
        '30' => [
            'name' => 'SBERBANK BANKA D.D.',
            'address' => 'Dunajska cesta 128 a, 1000 Ljubljana',
            'BIC' => 'SABRSI2X'
        ], 
        '38' => [
            'name' => 'SID - SLOVENSKA IZVOZNA IN RAZVOJNA BANKA, d.d., LJUBLJANA',
            'address' => 'Ulica Josipine Turnograjske 6, 1000 Ljubljana',
            'BIC' => 'SIDRSI22'
        ], 
        '03' => [
            'name' => 'SKB BANKA D.D. LJUBLJANA',
            'address' => 'Ajdovščina 4, 1513 Ljubljana',
            'BIC' => 'SKBASI2X'
        ], 
        '29' => [
            'name' => 'UNICREDIT BANKA SLOVENIJE D.D.',
            'address' => 'Šmartinska 140, 1000 Ljubljana',
            'BIC' => 'BACXSI22'
        ]
    ];

}