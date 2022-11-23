<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\SkillRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

use function PHPUnit\Framework\isNull;

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
    #[Groups(['skill:read'])]
    private int $id;

    /**
     * @Gedmo\Slug(fields={"name"})
     */
    #[ORM\Column(length: 255, unique: true)]
    #[Groups(['skill:read'])]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups(['skill:read', 'skill:write'])]
    private string $name;

    #[Groups(['skill:read', 'skill:write'])]
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, options:['default' => '01/01/2022'])]
    private ?\DateTimeInterface $creationDate = null;

    #[Groups(['skill:read', 'skill:write'])]
    #[ORM\Column(type: Types::DATE_MUTABLE, options:['default' => '01/01/2022'])]
    private ?\DateTimeInterface $modificationDate = null;

    #[Groups(['skill:read'])]
    #[ORM\ManyToMany(targetEntity: Book::class, inversedBy: 'skill')]
    private Collection $book;

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
        $this->book = new ArrayCollection();
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updateDateTime()
    {
        $dateTimeNow = new \DateTime('now');

        if (!$this->getCreationDate()) {
            $this->setCreationDate($dateTimeNow);
        }
        $this->setModificationDate($dateTimeNow);
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
        $date = "";
        if (!isNull($this->creationDate)) 
        $date = $this->creationDate->format('d/m/Y');
        return $date;
    }

    public function setCreationDate(): void
    {
        $this->creationDate = new \DateTime();
    }

    public function getModificationDate(): string
    {
        return $this->modificationDate->format('d/m/Y');
    }

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

    /**
     * @return Collection<int, Book>
     */
    public function getBook(): Collection
    {
        return $this->book;
    }

    public function addBook(Book $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book->add($book);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        $this->book->removeElement($book);

        return $this;
    }
}
