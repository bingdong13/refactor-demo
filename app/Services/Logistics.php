<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Class Logistics
 *
 * TODO
 *
 * @package   App\Services
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 17:50
 */
class Logistics
{
    use LogTrait;

    /**
     *
     * @param array $weights
     *
     * @return array
     */
    protected function arrayToCollection(array $weights)
    {
        $weights = collect($weights);

        return $weights;
    }

    /**
     *
     * @param array $weights
     * @param int $amount
     * @param callable $closure
     *
     * @return int
     */
    public function calculateFee(array $weights, int $amount, callable $closure): int
    {
        $weights = $this->arrayToCollection($weights);

        foreach ($weights as $weight) {

            $amount += $closure($weight);
        }

        $this->writeLog('运费：' . $amount);

        return $amount;
    }

}