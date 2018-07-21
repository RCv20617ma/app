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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ReferenceModePayment")
     */
    protected $modePayment;

    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\File", cascade={"all"})
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
     * Set modePayment
     *
     * @param \AppBundle\Entity\ReferenceModePayment $modePayment
     *
     * @return Payment
     */
    public function setModePayment(\AppBundle\Entity\ReferenceModePayment $modePayment = null)
    {
        $this->modePayment = $modePayment;

        return $this;
    }

    /**
     * Get modePayment
     *
     * @return \AppBundle\Entity\ReferenceModePayment
     */
    public function getModePayment()
    {
        return $this->modePayment;
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
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
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

    /**
     * Set typeMaintenance
     *
     * @param \AppBundle\Entity\File $File
     *
     * @return AbstractPayment
     */
    public function setFile(\AppBundle\Entity\File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \AppBundle\Entity\File
     */
    public function getFile()
    {
        return $this->file;
    }
}
