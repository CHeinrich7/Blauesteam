<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21.03.15
 * Time: 15:46
 */

namespace cmh\UserBundle\DataFixtures\ORM;

use cmh\UserBundle\Entity\Role;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;


class LoadRolesData extends UserDataLoader implements OrderedFixtureInterface {

    private $filename = 'roles.json';

    private function loadRoles($content, ObjectManager $objectManager)
    {
        $roles = json_decode($content);

        foreach($roles as $role)
        {
            $entityRole = new Role($role);
            $objectManager->persist($entityRole);
        }
    }

    /**
     * @param ObjectManager $objectManager
     *
     * @throws FileNotFoundException
     */
    public function load(ObjectManager $objectManager)
    {

        $content = $this->getFileContent($this->filename);

        if($content === false) {
            throw new FileNotFoundException('File \'' . $this->filename . '\' cannot be found');
        }

        $this->loadRoles($content, $objectManager);

        $objectManager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
} 