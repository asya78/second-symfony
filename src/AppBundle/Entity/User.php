<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25/11/2018
 * Time: 11:00 PM
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class User
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @var string $name;
     */
    private $name;

    /**
     * @var \$datetime
     */
    private $createDate;

    /**
     * @var integer $age
     */
    private $age;

    /**
     * @var integer $cityId
     */
    private $cityId;

    /**
     * @var integer
     */
    private $countryID;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \ $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * @param int $cityId
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @var string $description
     */
    private $description;

    /**
     * @return int
     */
    public function getCountryID()
    {
        return $this->countryID;
    }

    /**
     * @param int $countryID
     */
    public function setCountryID($countryID)
    {
        $this->countryID = $countryID;
    }
}