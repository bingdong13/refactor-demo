<?php
declare(strict_types=1);

/**
 * 改用 switch 写法会比 if else 可读性高些。
 *
 * PhpStorm 也提供工具可以直接将 if else 转成 switch，
 * 按热键 ⌥(option) + ↩(return)，选择 Replace if with switch。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.1 2017/8/28 16:59
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

                $weights = collect($weights);

                foreach ($weights as $weight) {
                    $amount = $amount + (100 + $weight * 10);
                }

                break;
            case 'JingDong':

                $weights = collect($weights);

                foreach ($weights as $weight) {
                    $amount = $amount + (80 + $weight * 15);
                }

                break;
            case 'PostOffice':

                $weights = collect($weights);

                foreach ($weights as $weight) {
                    $amount = $amount + (60 + $weight * 20);
                }

                break;
            default:

                $weights = collect($weights);

                foreach ($weights as $weight) {
                    $amount = $amount + (100 + $weight * 10);
                }

                break;
        }

        return $amount;
    }
}