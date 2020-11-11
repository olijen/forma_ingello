<?php

namespace forma\modules\product\components;

use forma\modules\product\records\Product;

class SkuGenerator
{
    protected static $_separator = '-';

    public static function generate($post)
    {
        $sku = '';

        $sku .= self::formatName($post['name']);

        if (self::skuExists($sku)) {
            $i = 0;
            do {
                $i++;
            } while(self::skuExists($sku . "-$i"));
            $sku .= "-$i";
        }

        return strtoupper($sku);
    }

    protected static function skuExists($sku)
    {
        return Product::find('id')->where(['sku' => $sku])->exists();
    }

    protected static function formatName($name)
    {
        $name = self::translit($name);
        $name = self::deleteForbiddenSymbols($name);

        return substr($name, 0, 4);
    }

    protected function formatVolume($volume)
    {
        return (int) $volume;
    }

    protected function formatBatcher($batcher)
    {
        $batcher = (int) $batcher;

        if ($batcher === Product::REF_ID) {
            return 'ref';
        } elseif ($batcher === Product::NRF_ID) {
            return 'nrf';
        }
    }

    protected function formatYearChart($yearChart)
    {
        return $yearChart;
    }

    protected static function translit($name)
    {
        $name = mb_strtolower($name);

        $alphabet = [
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',    'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        ];

        return strtr($name, $alphabet);
    }

    protected static function deleteForbiddenSymbols($name)
    {
        $forbiddenSymbols = ['a', 'e', 'i', 'o', 'u', 'y', ' '];

        return str_replace($forbiddenSymbols, '', $name);
    }
}
