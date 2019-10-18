<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Harbor;

class HarborFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $harbor = new Harbor();
        $harbor->setName("Le Vieux Port");
        $harbor->setAddressCity("Marseille");
        $harbor->setAddressZipcode("13012");
        $harbor->setAddressStreet("Quai du vieux port");
        $harbor->setDepth(5);
        $harbor->setPhoneNumber("04 91 99 75 60");
        $manager->persist($harbor);

        $harbor = new Harbor();
        $harbor->setName("Le Frioul");
        $harbor->setAddressCity("Frioul");
        $harbor->setAddressZipcode("13001");
        $harbor->setAddressStreet("Quai Berry");
        $harbor->setDepth(5);
        $harbor->setPhoneNumber("04 91 99 76 01");
        $manager->persist($harbor);

        $manager->flush();
    }
}
