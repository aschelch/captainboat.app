<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;     
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("john.doe@gmail.com");
        $user->setRoles([]);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'john'));
        $user->setName("John Doe");
        $manager->persist($user);

        $user = new User();
        $user->setEmail("admin@gmail.com");
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        $user->setName("Admin");

        $manager->persist($user);
        $manager->flush();
    }
}
