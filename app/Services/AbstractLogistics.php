<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Class AbstractLogistics
 *
 * TODO
 *
 * @package   App\Services
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 17:21
 */
abstract class AbstractLogistics
{
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
     * @param int $amount
     * @param array $weights
     * @param callable $closure
     *
     * @return int
     */
    protected function loopWeights(int $amount, array $weights, callable $closure): int
    {
        foreach ($weights as $weight) {

            $amount += $closure($weight);
        }

        return $amount;
    }
}