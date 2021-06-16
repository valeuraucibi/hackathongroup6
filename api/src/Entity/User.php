<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get"={},
 *          "post"={}
 *     },
 *     itemOperations={
 *          "get"={},
 *          "put"={},
 *     }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = ["ROLE_USER"];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\OneToMany(targetEntity=HistoricEvents::class, mappedBy="user")
     */
    private $favoriteHistoricEvent;

    /**
     * @ORM\OneToMany(targetEntity=HistoricNormales::class, mappedBy="user")
     */
    private $favoriteHistoricNormale;

    public function __construct()
    {
        $this->favoriteHistoricEvent = new ArrayCollection();
        $this->favoriteHistoricNormale = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

	public function getUsername() {
                                                         		// TODO: Implement getUsername() method.
                                                         	}

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return Collection|HistoricEvents[]
     */
    public function getFavoriteHistoricEvent(): Collection
    {
        return $this->favoriteHistoricEvent;
    }

    public function addFavoriteHistoricEvent(HistoricEvents $favoriteHistoricEvent): self
    {
        if (!$this->favoriteHistoricEvent->contains($favoriteHistoricEvent)) {
            $this->favoriteHistoricEvent[] = $favoriteHistoricEvent;
            $favoriteHistoricEvent->setUser($this);
        }

        return $this;
    }

    public function removeFavoriteHistoricEvent(HistoricEvents $favoriteHistoricEvent): self
    {
        if ($this->favoriteHistoricEvent->removeElement($favoriteHistoricEvent)) {
            // set the owning side to null (unless already changed)
            if ($favoriteHistoricEvent->getUser() === $this) {
                $favoriteHistoricEvent->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HistoricNormales[]
     */
    public function getFavoriteHistoricNormale(): Collection
    {
        return $this->favoriteHistoricNormale;
    }

    public function addFavoriteHistoricNormale(HistoricNormales $favoriteHistoricNormale): self
    {
        if (!$this->favoriteHistoricNormale->contains($favoriteHistoricNormale)) {
            $this->favoriteHistoricNormale[] = $favoriteHistoricNormale;
            $favoriteHistoricNormale->setUser($this);
        }

        return $this;
    }

    public function removeFavoriteHistoricNormale(HistoricNormales $favoriteHistoricNormale): self
    {
        if ($this->favoriteHistoricNormale->removeElement($favoriteHistoricNormale)) {
            // set the owning side to null (unless already changed)
            if ($favoriteHistoricNormale->getUser() === $this) {
                $favoriteHistoricNormale->setUser(null);
            }
        }

        return $this;
    }
}
