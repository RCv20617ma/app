<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class AbstractPayment
 *
 * @ORM\Entity()
 * @ORM\Table(name="abstract_payment")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="dtype", type="string")
 * @ORM\DiscriminatorMap(
 *   {
 *     Payment::DISCRIMINATOR = Payment::class,
 *     Outgo::DISCRIMINATOR = Outgo::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
abstract class AbstractPayment
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="numberPayment", type="string", length=255)
     */
    protected $numberPayment;


    /**
     * @ORM\ManyToMany(targetEntity="\CoreBundle\Entity\File")
     */
    protected $file;

    /**
     * @ORM\Column(name="date", type="datetime")
     */
     protected $date;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2)
     */
    protected $amount;

     /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=64, nullable=true)
     */
    protected $number;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    protected $note;

    /**
     * Set numberPayment
     *
     * @param integer $numberPayment
     *
     * @return AbstractPayment
     */
    public function setNumberPayment($numberPayment)
    {
        $this->numberPayment = $numberPayment;

        return $this;
    }

    /**
     * Get numberPayment
     *
     * @return integer
     */
    public function getNumberPayment()
    {
        return $this->numberPayment;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Payment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Payment
     */
    public function setDatePayment($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDatePayment()
    {
        return $this->date;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Payment
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Payment
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}
