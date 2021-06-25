<?php

namespace App\Entity;

use App\Repository\PhotographeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PhotographeRepository::class)
 * @Vich\Uploadable
 */
class Photographe
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
    private $NomPhotographe;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $PrenomPhotographe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MailPhotographe;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="upload", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="text")
     */
    private $DescPhotographe;

    /**
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="photographe")
     */
    private $relation_photos;

    public function __construct()
    {
        $this->relation_photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPhotographe(): ?string
    {
        return $this->NomPhotographe;
    }

    public function setNomPhotographe(string $NomPhotographe): self
    {
        $this->NomPhotographe = $NomPhotographe;

        return $this;
    }

    public function getPrenomPhotographe(): ?string
    {
        return $this->PrenomPhotographe;
    }

    public function setPrenomPhotographe(string $PrenomPhotographe): self
    {
        $this->PrenomPhotographe = $PrenomPhotographe;

        return $this;
    }

    public function getMailPhotographe(): ?string
    {
        return $this->MailPhotographe;
    }

    public function setMailPhotographe(string $MailPhotographe): self
    {
        $this->MailPhotographe = $MailPhotographe;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescPhotographe(): ?string
    {
        return $this->DescPhotographe;
    }

    public function setDescPhotographe(string $DescPhotographe): self
    {
        $this->DescPhotographe = $DescPhotographe;

        return $this;
    }

    /**
     * @return Collection|Photos[]
     */
    public function getRelationPhotos(): Collection
    {
        return $this->relation_photos;
    }

    public function addRelationPhoto(Photos $relationPhoto): self
    {
        if (!$this->relation_photos->contains($relationPhoto)) {
            $this->relation_photos[] = $relationPhoto;
            $relationPhoto->setPhotographe($this);
        }

        return $this;
    }

    public function removeRelationPhoto(Photos $relationPhoto): self
    {
        if ($this->relation_photos->removeElement($relationPhoto)) {
            // set the owning side to null (unless already changed)
            if ($relationPhoto->getPhotographe() === $this) {
                $relationPhoto->setPhotographe(null);
            }
        }

        return $this;
    }
}
