<?php
declare(strict_types=1);

namespace Order\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Order\Entity\Order;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $total = ($i + 0.3) * 3;
            $order = (new Order())->fromArray([
                'sessionId' => 'session_id_fixture_' . $i,
                'token' => 'token_fixture_' . $i,
                'status' => $i,
                'subTotal' => $total,
                'grandTotal' => $total,
                'total' => $total,
                'itemDiscount' => 0.0,
                'discount' => 0.0,
                'tax' => 0.0,
                'shipping' => 0.0,
                'createdAt' => new DateTime()
            ]);

            $manager->persist($order);
        }

        $manager->flush();
    }
}
