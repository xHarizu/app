<?php
/**
 * Answer fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Answer;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AnswerFixtures.
 */
class AnswerFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @param \Doctrine\Persistence\ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(12, 'answers', function ($i) {
            $answer = new Answer();
            $answer->setAnswerText($this->faker->sentence);
            $answer->setEmail($this->faker->email);
            $answer->setNick($this->faker->colorName);
            $answer->setQuestion($this->getRandomReference('questions'));
            $answer->setIsBest($this->faker->numberBetween(0, 1));

            return $answer;
        });

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return array Array of dependencies
     */
    public function getDependencies(): array
    {
        return [QuestionFixtures::class];
    }

}