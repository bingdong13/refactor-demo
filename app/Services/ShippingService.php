<?php
declare(strict_types=1);

/**
 * 依赖注入，解决与特定 class 耦合，达到低耦合的目的。
 *
 * Dependency Injection 让我们由外部注入內部所需相依的对象，
 * 因此 method 就不必再根据条件去判断该相依哪一个对象，
 * 也因为不用判断，因此将来若有新的相依对象，也不需修改代码，方便日后维护。
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