<?php
namespace Form\cmh;

use Symfony\Component\Form\AbstractType;


class Checkbox extends AbstractType
{


    public function getParent()
    {
        return 'checkbox';
    }

    public function getName()
    {
        return 'cmh_checkbox';
    }
}