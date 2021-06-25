<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 * @Vich\Uploadable
 */
class Categories
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
    private $NomCategories;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DescCourteCategories;

    /**
     * @ORM\Column(type="text")
     */
    private $DescLongueCategories;

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
     * @ORM\OneToMany(targetEntity=Photos::class, mappedBy="categories")
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

    public function getNomCategories(): ?string
    {
        return $this->NomCategories;
    }

    public function setNomCategories(string $NomCategories): self
    {
        $this->NomCategories = $NomCategories;

        return $this;
    }

    public function getDescCourteCategories(): ?string
    {
        return $this->DescCourteCategories;
    }

    public function setDescCourteCategories(string $DescCourteCategories): self
    {
        $this->DescCourteCategories = $DescCourteCategories;

        return $this;
    }

    public function getDescLongueCategories(): ?string
    {
        return $this->DescLongueCategories;
    }

    public function setDescLongueCategories(string $DescLongueCategories): self
    {
        $this->DescLongueCategories = $DescLongueCategories;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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
            $relationPhoto->setCategories($this);
        }

        return $this;
    }

    public function removeRelationPhoto(Photos $relationPhoto): self
    {
        if ($this->relation_photos->removeElement($relationPhoto)) {
            // set the owning side to null (unless already changed)
            if ($relationPhoto->getCategories() === $this) {
                $relationPhoto->setCategories(null);
            }
        }

        return $this;
    }
}
