<?php
/**
 * 货币助手类
 *
 * @author Janson
 * @create 2017-07-25
 */
namespace EC\Utils;

class Currency {
    /**
     * 货币
     *
     * @var array
     */
    protected static $currencies = [
        1 => ['cn' => '人民币', 'en' => 'CNY'],
        2 => ['cn' => '港币', 'en' => 'HKD'],
        3 => ['cn' => '澳门元', 'en' => 'MOP'],
        4 => ['cn' => '台币', 'en' => 'TWD'],
        5 => ['cn' => '日元', 'en' => 'JPY'],
        6 => ['cn' => '美元', 'en' => 'USD'],
        7 => ['cn' => '英镑', 'en' => 'GBP'],
        8 => ['cn' => '欧元', 'en' => 'EUR'],
        9 => ['cn' => '泰铢', 'en' => 'THP'],
        10 => ['cn' => '越南盾', 'en' => 'VND'],
        11 => ['cn' => '韩国元', 'en' => 'KRW'],
        12 => ['cn' => '新加坡元', 'en' => 'SGD'],
        13 => ['cn' => '加拿大元', 'en' => 'CAD'],
        14 => ['cn' => '法国法郎', 'en' => 'FRF'],
        15 => ['cn' => '澳大利亚元', 'en' => 'AUD'],
        16 => ['cn' => '俄罗斯卢布', 'en' => 'SUR'],
        17 => ['cn' => '瑞士法郎', 'en' => 'CHF'],
        18 => ['cn' => '德国马克', 'en' => 'DEM'],
        19 => ['cn' => '其他'],
    ];

    /**
     * 获取货币所有项
     *
     * @return array
     */
    public static function getCurrencies() {
        $currencies = [];

        foreach (self::$currencies as $id => $item) {
            $currencies[] = [
                'id' => $id, 'text' => self::combineText($item)
            ];
        }

        return $currencies;
    }

    /**
     * 获取货币完整文本
     *
     * @param int $id
     * @return string
     */
    public static function getFullText($id) {
        return isset(self::$currencies[$id]) ? self::combineText(self::$currencies[$id]) : '';
    }

    /**
     * 获取货币中文文本
     *
     * @param int $id
     * @return string
     */
    public static function getCnText($id) {
        return isset(self::$currencies[$id]['cn']) ? self::$currencies[$id]['cn'] : '';
    }

    /**
     * 获取货币英文文本
     *
     * @param int $id
     * @return string
     */
    public static function getEnText($id) {
        return isset(self::$currencies[$id]['en']) ? self::$currencies[$id]['en'] : '';
    }

    /**
     * 组合中、英文文本
     *
     * @param array $data
     * @return string
     */
    protected static function combineText(array $data) {
        return isset($data['en']) ? sprintf('%s(%s)', $data['cn'], $data['en']) : $data['cn'];
    }
}
