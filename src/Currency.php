<?php
/**
 * 货币助手类
 *
 * @author Janson
 * @create 2017-07-25
 */
namespace EC\Utils;

class Currency {
    public static $currencies = [
        1 => '人民币(CNY)',
        2 => '港币(HKD)',
        3 => '澳门元(MOP)',
        4 => '台币(TWD)',
        5 => '日元(JPY)',
        6 => '美元(USD)',
        7 => '英镑(GBP)',
        8 => '欧元(EUR)',
        9 => '泰铢(THP)',
        10 => '越南盾(VND)',
        11 => '韩国元(KRW)',
        12 => '新加坡元(SGD)',
        13 => '加拿大元(CAD)',
        14 => '法国法郎(FRF)',
        15 => '澳大利亚元(AUD)',
        16 => '俄罗斯卢布(SUR)',
        17 => '瑞士法郎(CHF)',
        18 => '德国马克(DEM)',
        19 => '其他'
    ];

    /**
     * 获取货币所有项
     *
     * @return array
     */
    public static function getCurrencies() {
        $currencies = [];

        foreach (self::$currencies as $id => $text) {
            $currencies[] = ['id' => $id, 'text' => $text];
        }

        return $currencies;
    }

    /**
     * 获取货币详述
     *
     * @param int $id
     * @return string
     */
    public static function getText($id) {
        return isset(self::$currencies[$id]) ? self::$currencies[$id] : '';
    }

    /**
     * 获取货币简述
     *
     * @param int $id
     * @return string
     */
    public static function getShortText($id) {
        $text = self::getText($id);

        if ($text) {
            $text = preg_replace('/\(\w+\)/', '', $text);
        }

        return $text;
    }
}
