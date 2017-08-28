<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Interface LogisticsInterface
 *
 * TODO
 *
 * @package   App\Services
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 17:31
 */
interface LogisticsInterface
{
    /**
     *
     * @param array $weights
     * @param int   $amount
     *
     * @return int
     */
    public function calculateFee(array $weights, int $amount) : int;

}