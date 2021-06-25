<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomContact;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $PrenomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MailContact;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SujetContact;

    /**
     * @ORM\Column(type="text")
     */
    private $MessageContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->NomContact;
    }

    public function setNomContact(string $NomContact): self
    {
        $this->NomContact = $NomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->PrenomContact;
    }

    public function setPrenomContact(string $PrenomContact): self
    {
        $this->PrenomContact = $PrenomContact;

        return $this;
    }

    public function getMailContact(): ?string
    {
        return $this->MailContact;
    }

    public function setMailContact(string $MailContact): self
    {
        $this->MailContact = $MailContact;

        return $this;
    }


    public function getSujetContact(): ?string
    {
        return $this->SujetContact;
    }

    public function setSujetContact(string $SujetContact): self
    {
        $this->SujetContact = $SujetContact;

        return $this;
    }

    public function getMessageContact(): ?string
    {
        return $this->MessageContact;
    }

    public function setMessageContact(string $MessageContact): self
    {
        $this->MessageContact = $MessageContact;

        return $this;
    }
}
