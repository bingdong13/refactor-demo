<?php
declare(strict_types=1);

namespace App\Services;

/**
 * Trait LogTrait
 *
 * TODO
 *
 * @package   App\Services
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/28 17:42
 */
trait LogTrait
{
    /**
     * @param string $message
     */
    public function writeLog(string $message)
    {
        // 写入日志

        echo $message . "\n";
    }
}