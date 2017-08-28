<?php
declare(strict_types=1);

/**
 * 面向对象最大的特点就是 class，我們要将相关的 method 放在同一个 class，达到高內聚的目标。
 *
 * 在重构第一式：Extract Method 时，我们特別以名词 + 动词的方式替 method 命名，
 * 其中若名词相同，则表示這些 mehtod 的內聚性很高，
 * 适合将这些 method 再通过重构第二式 : Extract Class 重构到新的 class 內。
 *
 * Extract Class 让我们将相关的 method 放在同一个 class內，达到高內聚的目标，可增加程序的可读性与可维护性，也更容易重复使用。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.3 2017/8/28 17:12
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