<?php

namespace App\Entity;

use App\Repository\TechniquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=TechniquesRepository::class)
 * @Vich\Uploadable
 */
class Techniques
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
    private $NomTechnique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DescCourteTechnique;

    /**
     * @ORM\Column(type="text")
     */
    private $DescLongueTechnique;

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
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="techniques")
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

    public function getNomTechnique(): ?string
    {
        return $this->NomTechnique;
    }

    public function setNomTechnique(string $NomTechnique): self
    {
        $this->NomTechnique = $NomTechnique;

        return $this;
    }

    public function getDescCourteTechnique(): ?string
    {
        return $this->DescCourteTechnique;
    }

    public function setDescCourteTechnique(string $DescCourteTechnique): self
    {
        $this->DescCourteTechnique = $DescCourteTechnique;

        return $this;
    }

    public function getDescLongueTechnique(): ?string
    {
        return $this->DescLongueTechnique;
    }

    public function setDescLongueTechnique(string $DescLongueTechnique): self
    {
        $this->DescLongueTechnique = $DescLongueTechnique;

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
            $relationPhoto->setTechniques($this);
        }

        return $this;
    }

    public function removeRelationPhoto(Photos $relationPhoto): self
    {
        if ($this->relation_photos->removeElement($relationPhoto)) {
            // set the owning side to null (unless already changed)
            if ($relationPhoto->getTechniques() === $this) {
                $relationPhoto->setTechniques(null);
            }
        }

        return $this;
    }
}
