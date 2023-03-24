<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require "src/ciphers/BaconCipher.php";

final class BaconCipherTest extends TestCase
{
    private BaconCipher $baconCipher;

    public function setUp(): void
    {
        $this->baconCipher = new BaconCipher();
    }

    /**
     * @dataProvider validEncryptInputProvider
     */  
    public function testEncryptValidInput($input, $validResult): void
    {
        $result = $this->baconCipher->encrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validEncryptInputProvider(): array
    {
        return [
            [
                'zala ma kota',
                'bbaabaaaaaababbaaaaa abbaaaaaaa ababaabbbabaabbaaaaa',
            ],
            [
                'a',
                'aaaaa',
            ],
            [
                'b',
                'aaaab',
            ],
            [
                'c',
                'aaaba',
            ],
            [
                'x',
                'babbb',
            ],
            [
                'y',
                'bbaaa',
            ],
            [
                'z',
                'bbaab',
            ],
        ];
    }

    
    /**
     * @dataProvider validDencryptInputProvider
     */  
    public function testDencryptValidInput($input, $validResult): void
    {
        $result = $this->baconCipher->decrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validDencryptInputProvider(): array
    {
        return [
            [
                'bbaabaaaaaababbaaaaa abbaaaaaaa ababaabbbabaabbaaaaa',
                'zala ma kota',
            ],
            [
                'aaaaa',
                'a',
            ],
            [
                'aaaab',
                'b',
            ],
            [
                'aaaba',
                'c',
            ],
            [
                'babbb',
                'x',
            ],
            [
                'bbaaa',
                'y',
            ],
            [
                'bbaab',
                'z',
            ],
        ];
    }
}