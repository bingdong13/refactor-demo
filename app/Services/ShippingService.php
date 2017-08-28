<?php
declare(strict_types=1);

/**
 * Replace Interface with Closure 让我们适时地将不必要的 interface 用 closure 取代，
 * 可解決 interface 数目及文件数量爆炸的问题，
 * 但也不是每个 interface 都要重构成 closure，
 * 必须自己依照实际情形加以判断，沒有最佳解，只有最适解。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.8 2017/8/28 17:50
 */
class ShippingService
{
    /**
     * 计算运费
     *
     * @param array  $weights     重量系列
     * @param callable $closure
     * @param Logistics $logistics
     *
     * @return int
     */
    public function calculateFee(array $weights, Logistics $logistics, callable $closure): int
    {
        $amount = 0;

        return $logistics->calculateFee($weights, $amount, $closure);
    }
}