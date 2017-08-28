<?php
declare(strict_types=1);

/**
 * 当多个 class 的 method 都相同时，可以使用重构第五式 : Extract Interface，
 * 以更宏观的角度，将这些 class 抽象化成一个相同的 interface。
 *
 * 总结：Extract Interface 让我们将相同 method 的 class，抽象化成相同 interface 的对象，
 * 如果将来需求有改变，但只要 interface 不变，代码就不用修改，方便将来维护。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.6 2017/8/28 17:30
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

                $logistics = new CaiNiaoService();
                $amount = $logistics->calculateFee($weights, $amount);

                break;
            case 'JingDong':

                $logistics = new JingDongService();
                $amount = $logistics->calculateFee($weights, $amount);

                break;
            case 'PostOffice':

                $logistics = new PostOfficeService();
                $amount = $logistics->calculateFee($weights, $amount);

                break;
            default:

                $logistics = new CaiNiaoService();
                $amount = $logistics->calculateFee($weights, $amount);

                break;
        }

        return $amount;
    }
}