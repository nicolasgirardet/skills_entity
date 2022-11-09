<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\SkillRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Delete(),
    ],
    normalizationContext: ['groups' => ['skill:read']],
    denormalizationContext: ['groups' => ['skill:write']],
)]
class Skill implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    /**
     * @Gedmo\Slug(fields={"name"})
     */
    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups(['skill:read', 'skill:write', 'book:read'])]
    private string $name;

    #[Groups(['skill:read', 'skill:write', 'book:read'])]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[Groups(['skill:read'])]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $modificationDate = null;

  

    public function jsonSerialize()
    {
        $skill = [
            'id' => $this->getId(),
            'slug' => $this->getSlug(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
        ];

        return $skill;
    }

    public function __construct()
    {
        $this->creationDate = new \DateTime();
        $this->modificationDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCreationDate(): string
    {
        return $this->creationDate->format('d/m/Y');
    }

    #[ORM\PrePersist]
    public function setCreationDate(): void
    {
        $this->creationDate = new \DateTime();
    }

    public function getModificationDate(): string
    {
        return $this->modificationDate->format('d/m/Y');
    }

    #[ORM\PrePersist]
    public function setModificationDate(): void
    {
        $this->modificationDate = new \DateTime();
    }
    
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
