<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
        $user->setEmail('alex.hos.27@gmail.com');
        $user->setNickname('Admin');
        $user->setAvatar('AdminIcon.jpeg');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('puckthed@outlook.fr');
        $user2->setNickname('Player1');
        $user2->setAvatar('DefaultAvatar.jpeg');
        $user2->setRoles(array('ROLE_USER'));
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'player'));
        $manager->persist($user2);

        $manager->flush();

        $this->addReference('UserAdmin', $user);
        $this->addReference('User', $user2);
    }
}