<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Services\ShippingService;
use App\Services\Logistics;

/**
 * Class ShippingServiceTest
 *
 * 测试案例
 *
 * @package   ShippingServiceTest.php
 * @author    lvmaohai <lvmaohai@vpgame.cn>
 * @version   v0.1.1 2017/8/20 17:39
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
        $logistics = new Logistics();

        $actual = $target->calculateFee($weights, $logistics, function (int $weight) {
            return (100 + $weight * 10);
        });

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
        $logistics = new Logistics();

        $actual = $target->calculateFee($weights, $logistics, function (int $weight) {
            return (80 + $weight * 15);
        });

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
        $logistics = new Logistics();

        $actual = $target->calculateFee($weights, $logistics, function (int $weight) {
            return (60 + $weight * 20);
        });

        /** assert */
        $expected = 300;
        $this->assertEquals($expected, $actual);
    }
}