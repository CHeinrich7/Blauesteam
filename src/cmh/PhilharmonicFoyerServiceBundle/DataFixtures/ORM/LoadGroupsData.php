<?php
namespace cmh\PhilharmonicFoyerServiceBundle\DataFixtures\ORM;

use cmh\UserBundle\DataFixtures\ORM\UserDataLoader;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use cmh\PhilharmonicFoyerServiceBundle\Entity\Group;


class LoadGroupsData extends UserDataLoader implements OrderedFixtureInterface {

    private $filename = 'groups.json';

    private function loadGroups($content, ObjectManager $objectManager)
    {
        $groups = json_decode($content);

        foreach($groups as $group)
        {
            $entityGroup = new Group($group);
            $objectManager->persist($entityGroup);
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

        $this->loadGroups($content, $objectManager);

        $objectManager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

    /**
     * @param $entity
     * @param \stdClass      $data
     */
    protected function fillEntity($entity, $data)
    {
//        $cout = new ConsoleOutput();
        foreach($data as $key => $val)
        {
            if(method_exists($entity, 'set'.$key)) {
//                $cout->writeln('set'.$key.'( '.print_r($val, true).' )');
                $entity->{'set'.$key}($val);
            }
        }
    }

    /**
     * @param string $filename
     *
     * @return string|false
     */
    protected function getFileContent($filename)
    {
        $finder = new Finder();

        $files = $finder->in(__DIR__);

        foreach($files as $file) /* @var $file SplFileInfo */
        {
            if($file->getFilename() == $filename) {
                return $file->getContents();
            }
        }

        return false;
    }
} 