<?php
declare(strict_types=1);

/**
 * 当 Extract Class 之后，根据 DRY 原则，我们不希望 method 內有重复代码，这会造成日后维护上的困难，
 * 因为每次修改就得修改好几处代码，还可能忘记修改其中一份，而造成逻辑上的不一致。
 *
 * 对 method 內重复的代码，可以使用重构第三式 : Extract Superclass，将重复的程序重构到 abstract class。
 *
 * 总结：Extract Superclass 让我们将 class 內重复的部分抽出來，
 * 放到 abstract class 的 protected method 內，
 * 如此，继承的 class 就可共用此 method，避免代码重复。
 */

namespace App\Services;

/**
 * Class ShippingService
 *
 * TODO
 *
 * @package   ShippingService.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.4 2017/8/28 17:20
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