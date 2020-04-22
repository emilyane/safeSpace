<?php

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MemberFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    } 
    
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5 ; $i++){
            $user = new User();
            $user->setEmail ("user".$i."@gmail.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'lePassword'.$i
             ));
             $user->setName("Emily".$i);
             $user->setLastName("user".$i);
             $user->setCommune("Schaerbeek");
             $user->setStreetAddress("Avenue de Diamant 15");
            $manager->persist ($user);
        }

        $manager->flush();
    }
}
