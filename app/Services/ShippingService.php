<?php
declare(strict_types=1);

/**
 * 重构一到六式，教我们的都是以垂直方式将 method 抽取到 class、abstract class、interface，也就是其都有垂直的关系，
 * 但某些 method，并没有垂直的关系，反而是跨 class 的水平关系。
 *
 * 对于这种水平关系的 method，可以使用重构第七式 : Extract Trait，将 method 重构到 trait。
 *
 * 总结：Extract Trait 让我们不用特別将不相关的 method 重构到 class 与 abstract class 內，
 * 所有水平关系的 method，都适合重构到 trait，然后跨 class 重复使用。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.7 2017/8/28 17:45
 */
class ShippingService
{
    /**
     * 计算运费
     *
     * @param array  $weights     重量系列
     * @param LogisticsInterface $logistics
     *
     * @return int
     */
    public function calculateFee(array $weights, LogisticsInterface $logistics): int
    {
        $amount = 0;

        return $logistics->calculateFee($weights, $amount);
    }
}