<?php

namespace App\DataFixtures;

use App\Entity\HistoricEvents;
use App\Entity\HistoricNormales;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
	    $faker = Factory::create('fr_FR');
	    $historicEvents = $manager->getRepository(HistoricEvents::class)->findAll();
	    $historicNormals = $manager->getRepository(HistoricNormales::class)->findAll();

	    // Create user admin user
	    $admin = (New User())
		    ->setEmail("admin@admin.fr")
		    ->setFirstName($faker->firstName)
		    ->setLastName($faker->lastName)
		    ->setPassword("password")
		    ->setRoles(["ROLE_ADMIN"])
	    ;

	    $manager->persist($admin);

	    for ($i=0; $i<10; $i++) {

		    $user = (new User())
			    ->setFirstName($faker->firstName)
			    ->setLastName($faker->lastName)
			    ->setEmail($faker->email)
			    ->setPassword($faker->password)
		    ;

		    for ($j=0; $j<5; $j++) {
			    $user->addFavoriteHistoricEvent($faker->randomElement($historicEvents));
			    $user->addFavoriteHistoricNormale($faker->randomElement($historicNormals));
		    }

		    $manager->persist($user);

	    }

	    $manager->flush();
    }
}
