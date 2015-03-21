<?php
namespace cmh\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

abstract class UserDataLoader extends AbstractFixture {

    /**
     * @param $entity
     * @param \stdClass      $data
     */
    protected function fillEntity($entity, $data)
    {
        foreach($data as $key => $val)
        {
            if(method_exists($entity, 'set'.$key)) {
                $entity->{'set'.$key}($val);
            }
        }
    }

    /**
     * @param string $filename
     *
     * @return string|false
     */
    public function getFileContent($filename)
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