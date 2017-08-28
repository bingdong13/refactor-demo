<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Class PostOfficeService
 *
 * TODO
 *
 * @package   App\Services
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 17:12
 */
class PostOfficeService extends AbstractLogistics
{
    /**
     * 计算邮局运费
     *
     * @param array $weights
     * @param int   $amount
     *
     * @return int
     */
    public function calculateFee(array $weights, int $amount): int
    {
        $weights = $this->arrayToCollection($weights);

        foreach ($weights as $weight) {
            $amount = $amount + (60 + $weight * 20);
        }

        return $amount;
    }
}