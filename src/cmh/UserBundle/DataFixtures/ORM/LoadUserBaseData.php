<?php

namespace cmh\UserBundle\DataFixtures\ORM;


use cmh\UserBundle\Entity\Profile;
use cmh\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class LoadUserBaseData
 * @package cmh\UserBundle\DataFixtures\ORM
 */
class LoadUserBaseData implements FixtureInterface {

    /**
     * @param User|Profile  $entity
     * @param \stdClass      $data
     */
    private function fillEntity($entity, $data)
    {
        foreach($data as $key => $val)
        {
            if(method_exists($entity, 'set'.$key)) {
                $entity->{'set'.$key}($val);
            }
        }
    }

    /**
     * @param string        $content
     * @param ObjectManager $objectManager
     */
    private function loadUsers($content, ObjectManager $objectManager)
    {
        $users = json_decode($content);
        $entityProfile = new Profile();
        $entityUser = new User();

        foreach($users as $entityName => $entityData)
        {
            switch($entityName) {
                case 'profile':
                    $this->fillEntity($entityProfile, $entityData);
                    break;
                case 'user':
                    $this->fillEntity($entityUser, $entityData);
                    break;
            }
        }

        $entityUser->setProfile($entityProfile);

        $objectManager->persist($entityUser);
        $objectManager->persist($entityProfile);
    }

    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager)
    {

        $userDataFileName = 'users.json';

        $finder = new Finder();

        $files = $finder->in(__DIR__);

        foreach($files as $file) /* @var $file SplFileInfo */
        {
            if($file->getFilename() == $userDataFileName) {
                $this->loadUsers($file->getContents(), $objectManager);
                break;
            }
        }

        $objectManager->flush();
    }

} 