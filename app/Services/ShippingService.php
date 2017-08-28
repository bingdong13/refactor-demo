<?php
declare(strict_types=1);

/**
 * 不过由 if else 变成 switch 并不算重构，只是让程序稍微好阅读些而已。
 *
 * 第一式 : Extract Method
 *
 * 所有的重构，都是从 Extract Method 开始，当我们发现程序中有以下特征：
 * 1. 当一段程序需要写注释特别解释时。
 * 2. 在 if else 内有一段逻辑时。
 * 3. 在 switch case 内有一段逻辑时。
 *
 * 就可以开始使用重构第一式，将一段程序重构成 method。
 *
 * PhpStorm 內建支持 Extract Method，先选择要抽取的程序，
 * 按热键 ⌃(control) + T，选择 Method，
 * 就会自动帮你將那段程序 extract 成新的 method。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.2 2017/8/28 17:10
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

        switch ($companyName) {
            case 'CaiNiao':

                $amount = $this->caiNiaoCalculateFee($weights, $amount);

                break;
            case 'JingDong':

                $amount = $this->JingDongCalculateFee($weights, $amount);

                break;
            case 'PostOffice':

                $amount = $this->postCalculateFee($weights, $amount);

                break;
            default:

                $amount = $this->caiNiaoCalculateFee($weights, $amount);

                break;
        }

        return $amount;
    }

    /**
     * 计算菜鸟运费
     *
     * @param array $weights
     * @param       $amount
     *
     * @return int
     */
    private function caiNiaoCalculateFee(array $weights, int $amount): int
    {
        $weights = collect($weights);

        foreach ($weights as $weight) {
            $amount = $amount + (100 + $weight * 10);
        }

        return $amount;
    }

    /**
     * 计算京东运费
     *
     * @param array $weights
     * @param int   $amount
     *
     * @return int
     */
    private function JingDongCalculateFee(array $weights, int $amount): int
    {
        $weights = collect($weights);

        foreach ($weights as $weight) {
            $amount = $amount + (80 + $weight * 15);
        }

        return $amount;
    }

    /**
     * 计算邮局运费
     *
     * @param array $weights
     * @param int   $amount
     *
     * @return int
     */
    private function postCalculateFee(array $weights, int $amount): int
    {
        $weights = collect($weights);

        foreach ($weights as $weight) {
            $amount = $amount + (60 + $weight * 20);
        }

        return $amount;
    }
}