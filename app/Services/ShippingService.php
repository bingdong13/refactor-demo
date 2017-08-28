<?php
declare(strict_types=1);

/**
 * 虽然我们可以将重复的代码通过 Extract Superclass 重构到 abstract class，
 * 但有时候会遇到一种代码，并不是整块重复，而是外层重复，內层却不重复。
 *
 * 对于 method 內有一段外层重复，內层却不重复的代码，
 * 可以使用重构第四式 : Extract Closure，
 * 将重复的代码重构到 abstract class，不重复的部分重构到 closure。
 *
 * 总结：Extract Closure 让我们将 class 內重复的部分抽出来，放到 abstract class 的 method 內，
 * 不重复的部分则放在各自 class，以 closure 的方式传入 abstract class，
 * 如此就可确保代码符合 DRY 原则，且各 class 也保有不重复部分。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.5 2017/8/28 17:26
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

                $caiNiao = new CaiNiaoService();
                $amount = $caiNiao->calculateFee($weights, $amount);

                break;
            case 'JingDong':

                $jingDong = new JingDongService();
                $amount = $jingDong->calculateFee($weights, $amount);

                break;
            case 'PostOffice':

                $postOffice = new PostOfficeService();
                $amount = $postOffice->calculateFee($weights, $amount);

                break;
            default:

                $caiNiao = new CaiNiaoService();
                $amount = $caiNiao->calculateFee($weights, $amount);

                break;
        }

        return $amount;
    }
}