<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\ShippingService;

/**
 * Class ShippingServiceTest
 *
 * 测试案例
 *
 * @package   ShippingServiceTest.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.0 2017/8/20 15:02
 */
class ShippingServiceTest extends TestCase
{
    /** @test */
    public function 菜鸟_当重量为1_2_3时_费用为360()
    {
        /** arrange */
        /** @var ShippingService $target */
        $target = new ShippingService();

        /** act */
        $weights = [1, 2, 3];
        $actual = $target->calculateFee($weights, 'CaiNiao');

        /** assert */
        $expected = 360;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 京东_当重量为1_2_3时_费用为330()
    {
        /** arrange */
        /** @var ShippingService $target */
        $target = new ShippingService();

        /** act */
        $weights = [1, 2, 3];
        $actual = $target->calculateFee($weights, 'JingDong');

        /** assert */
        $expected = 330;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 邮局_当重量为1_2_3时_费用为300()
    {
        /** arrange */
        /** @var ShippingService $target */
        $target = new ShippingService();

        /** act */
        $weights = [1, 2, 3];
        $actual = $target->calculateFee($weights, 'PostOffice');

        /** assert */
        $expected = 300;
        $this->assertEquals($expected, $actual);
    }
}