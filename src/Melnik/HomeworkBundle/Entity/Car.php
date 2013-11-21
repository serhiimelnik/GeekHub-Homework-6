<?php

namespace Melnik\HomeworkBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity
 */
class Car
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="make", type="string", length=1000, nullable=false)
     */
    private $make;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=1000, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=1000, nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="topSpeed", type="string", length=1000, nullable=false)
     */
    private $topSpeed;

    /**
     * @var string
     *
     * @ORM\Column(name="numberBuilt", type="string", length=1000, nullable=false)
     */
    private $numberBuilt;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=1000, nullable=false)
     */
    private $comment;

    /**
     * @var \Melnik\HomeworkBundle\Entity\Assembly
     *
     * @ORM\ManyToMany(targetEntity="Melnik\HomeworkBundle\Entity\Assembly", inversedBy="cars")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     * })
     */
    protected $assemblys;

    /**
     * @var \Melnik\HomeworkBundle\Entity\Manufacturer
     *
     * @ORM\ManyToOne(targetEntity="Melnik\HomeworkBundle\Entity\Manufacturer", inversedBy="car")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="manufacturer_id", referencedColumnName="id")
     * })
     */
    protected  $manufacturer;

    /**
     * @param mixed $assemblys
     */
    public function setAssemblys($assemblys)
    {
        $this->assemblys = $assemblys;
    }

    /**
     * @return mixed
     */
    public function getAssemblys()
    {
        return $this->assemblys;
    }

    public function __construct()
    {
        $this->assemblys = new ArrayCollection();
    }
    /**
     * @param string $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Get id
     *
     * @return integer
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
     * Set make
     *
     * @param string $make
     * @return Car
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set topSpeed
     *
     * @param string $topSpeed
     * @return Car
     */
    public function setTopSpeed($topSpeed)
    {
        $this->topSpeed = $topSpeed;

        return $this;
    }

    /**
     * Get topSpeed
     *
     * @return string
     */
    public function getTopSpeed()
    {
        return $this->topSpeed;
    }

    /**
     * Set numberBuilt
     *
     * @param string $numberBuilt
     * @return Car
     */
    public function setNumberBuilt($numberBuilt)
    {
        $this->numberBuilt = $numberBuilt;

        return $this;
    }

    /**
     * Get numberBuilt
     *
     * @return string
     */
    public function getNumberBuilt()
    {
        return $this->numberBuilt;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Car
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
