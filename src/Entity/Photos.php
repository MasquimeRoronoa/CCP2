<?php

namespace App\Entity;

use App\Repository\PhotosRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PhotosRepository::class)
 * @Vich\Uploadable
 */
class Photos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

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
     * @ORM\Column(type="string", length=100)
     */
    private $TitrePhoto;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $DimensionPhoto;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DatePhoto;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $VitessePhoto;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $OuverturePhoto;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $IsoPhoto;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $FocalePhoto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ObjectifPhoto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AppareilPhoto;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="relation_photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=Techniques::class, inversedBy="relation_photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $techniques;

    /**
     * @ORM\ManyToOne(targetEntity=Photographe::class, inversedBy="relation_photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $photographe;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitrePhoto(): ?string
    {
        return $this->TitrePhoto;
    }

    public function setTitrePhoto(string $TitrePhoto): self
    {
        $this->TitrePhoto = $TitrePhoto;

        return $this;
    }

    public function getDimensionPhoto(): ?string
    {
        return $this->DimensionPhoto;
    }

    public function setDimensionPhoto(?string $DimensionPhoto): self
    {
        $this->DimensionPhoto = $DimensionPhoto;

        return $this;
    }

    public function getDatePhoto(): ?\DateTimeInterface
    {
        return $this->DatePhoto;
    }

    public function setDatePhoto(?\DateTimeInterface $DatePhoto): self
    {
        $this->DatePhoto = $DatePhoto;

        return $this;
    }

    public function getVitessePhoto(): ?string
    {
        return $this->VitessePhoto;
    }

    public function setVitessePhoto(?string $VitessePhoto): self
    {
        $this->VitessePhoto = $VitessePhoto;

        return $this;
    }

    public function getOuverturePhoto(): ?string
    {
        return $this->OuverturePhoto;
    }

    public function setOuverturePhoto(?string $OuverturePhoto): self
    {
        $this->OuverturePhoto = $OuverturePhoto;

        return $this;
    }

    public function getIsoPhoto(): ?string
    {
        return $this->IsoPhoto;
    }

    public function setIsoPhoto(?string $IsoPhoto): self
    {
        $this->IsoPhoto = $IsoPhoto;

        return $this;
    }

    public function getFocalePhoto(): ?string
    {
        return $this->FocalePhoto;
    }

    public function setFocalePhoto(?string $FocalePhoto): self
    {
        $this->FocalePhoto = $FocalePhoto;

        return $this;
    }

    public function getObjectifPhoto(): ?string
    {
        return $this->ObjectifPhoto;
    }

    public function setObjectifPhoto(?string $ObjectifPhoto): self
    {
        $this->ObjectifPhoto = $ObjectifPhoto;

        return $this;
    }

    public function getAppareilPhoto(): ?string
    {
        return $this->AppareilPhoto;
    }

    public function setAppareilPhoto(?string $AppareilPhoto): self
    {
        $this->AppareilPhoto = $AppareilPhoto;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getTechniques(): ?Techniques
    {
        return $this->techniques;
    }

    public function setTechniques(?Techniques $techniques): self
    {
        $this->techniques = $techniques;

        return $this;
    }

    public function getPhotographe(): ?Photographe
    {
        return $this->photographe;
    }

    public function setPhotographe(?Photographe $photographe): self
    {
        $this->photographe = $photographe;

        return $this;
    }
}
