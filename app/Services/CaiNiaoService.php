<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Class CaiNiaoService
 *
 * TODO
 *
 * @package   App\Services
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 17:12
 */
class CaiNiaoService extends AbstractLogistics
{
    /**
     * 计算菜鸟运费
     *
     * @param array $weights
     * @param       $amount
     *
     * @return int
     */
    public function calculateFee(array $weights, int $amount): int
    {
        $weights = $this->arrayToCollection($weights);

        $amount = $this->loopWeights($amount, $weights, function (int $weight) {
            return (100 + $weight * 10);
        });

        return $amount;
    }
}