<?php
declare(strict_types=1);

/**
 * 一开始先求 绿灯 就好，因此我们很无脑的只使用 if else 与 foreach 就完成了
 * 但这样只是功能完成而已，所有高低阶逻辑全写在一起，程序不容易阅读，将来也不好维护。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 16:19
 */
class ShippingService
{
    /**
     * 计算运费
     *
     * @param array  $weights     重量系列
     * @param string $companyName 货运商名称
     *
     * @return int
     */
    public function calculateFee(array $weights, string $companyName): int
    {
        $amount = 0;

        if ($companyName === 'CaiNiao') {

            $weights = collect($weights);

            foreach ($weights as $weight) {
                $amount = $amount + (100 + $weight * 10);
            }

        } elseif ($companyName === 'JingDong') {

            $weights = collect($weights);

            foreach ($weights as $weight) {
                $amount = $amount + (80 + $weight * 15);
            }

        } else if ($companyName === 'PostOffice') {

            $weights = collect($weights);

            foreach ($weights as $weight) {
                $amount = $amount + (60 + $weight * 20);
            }

        } else {

            $weights = collect($weights);

            foreach ($weights as $weight) {
                $amount = $amount + (100 + $weight * 10);
            }
        }

        return $amount;
    }
}