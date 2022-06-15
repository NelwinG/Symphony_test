<?php

namespace App\Entity;

use App\Repository\TestProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestProductsRepository::class)
 */
class TestProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idproduct;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $create_iduser;

    /**
     * @ORM\Column(type="datetime")
     */
    private $update_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $update_iduser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $product_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prex_tax_price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $VAT;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdproduct(): ?int
    {
        return $this->idproduct;
    }

    public function setIdproduct(int $idproduct): self
    {
        $this->idproduct = $idproduct;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getCreateIduser(): ?int
    {
        return $this->create_iduser;
    }

    public function setCreateIduser(?int $create_iduser): self
    {
        $this->create_iduser = $create_iduser;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->update_date;
    }

    public function setUpdateDate(\DateTimeInterface $update_date): self
    {
        $this->update_date = $update_date;

        return $this;
    }

    public function getUpdateIduser(): ?int
    {
        return $this->update_iduser;
    }

    public function setUpdateIduser(?int $update_iduser): self
    {
        $this->update_iduser = $update_iduser;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrexTaxPrice(): ?int
    {
        return $this->prex_tax_price;
    }

    public function setPrexTaxPrice(?int $prex_tax_price): self
    {
        $this->prex_tax_price = $prex_tax_price;

        return $this;
    }

    public function getVAT(): ?int
    {
        return $this->VAT;
    }

    public function setVAT(?int $VAT): self
    {
        $this->VAT = $VAT;

        return $this;
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
}
