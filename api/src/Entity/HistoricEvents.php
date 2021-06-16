<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoricEvents
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
 * @ApiFilter(SearchFilter::class, properties={
 *     "id": "exact", "nom": "partial", "localisation": "partial", "date_deb": "partial", "date_fin": "partial", "bs_link": "exact", "gen_cartes": "exact"
 * })
 * @ApiFilter(BooleanFilter::class, properties={"importance", "has_image_cyclone", "duree", "type"})
 * @ORM\Table(name="historic_events", indexes={@ORM\Index(name="recherche", columns={"nom", "description", "short_desc"}), @ORM\Index(name="nom", columns={"nom"}), @ORM\Index(name="gen_cartes", columns={"gen_cartes"}), @ORM\Index(name="importance", columns={"importance", "type"}), @ORM\Index(name="hits", columns={"hits"})})
 * @ORM\Entity
 */
class HistoricEvents
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var bool
     *
     * @ORM\Column(name="importance", type="boolean", nullable=false)
     */
    private $importance;

    /**
     * @var string
     *
     * @ORM\Column(name="type_cyclone", type="string", length=100, nullable=false)
     */
    private $typeCyclone;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_image_cyclone", type="boolean", nullable=false, options={"comment"="0 ou 1"})
     */
    private $hasImageCyclone = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deb", type="date", nullable=false)
     */
    private $dateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var bool
     *
     * @ORM\Column(name="duree", type="boolean", nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="short_desc", type="text", length=65535, nullable=false)
     */
    private $shortDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="sources", type="text", length=65535, nullable=false)
     */
    private $sources;

    /**
     * @var int
     *
     * @ORM\Column(name="id_compte", type="integer", nullable=false)
     */
    private $idCompte;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur_max", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeurMax;

    /**
     * @var int
     *
     * @ORM\Column(name="bs_link", type="integer", nullable=false, options={"comment"="si lien avec un bs"})
     */
    private $bsLink;

    /**
     * @var bool
     *
     * @ORM\Column(name="gen_cartes", type="boolean", nullable=false, options={"comment"="indique s'il faut générer des cartes ou non"})
     */
    private $genCartes = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="why", type="text", length=65535, nullable=false)
     */
    private $why;

    /**
     * @var string
     *
     * @ORM\Column(name="tableau_croise", type="text", length=65535, nullable=false)
     */
    private $tableauCroise;

    /**
     * @var string
     *
     * @ORM\Column(name="tableau_croise_cyclone", type="text", length=65535, nullable=false)
     */
    private $tableauCroiseCyclone;

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false)
     */
    private $hits = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", length=65535, nullable=false)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="favoriteHistoricEvent")
     */
    private $user;

	/**
	 * @return int
	 */
	public function getId(): int {
         		return $this->id;
         	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): void {
         		$this->id = $id;
         	}

	/**
	 * @return string
	 */
	public function getNom(): string {
         		return $this->nom;
         	}

	/**
	 * @param string $nom
	 */
	public function setNom(string $nom): void {
         		$this->nom = $nom;
         	}

	/**
	 * @return string
	 */
	public function getLocalisation(): string {
         		return $this->localisation;
         	}

	/**
	 * @param string $localisation
	 */
	public function setLocalisation(string $localisation): void {
         		$this->localisation = $localisation;
         	}

	/**
	 * @return bool
	 */
	public function isImportance(): bool {
         		return $this->importance;
         	}

	/**
	 * @param bool $importance
	 */
	public function setImportance(bool $importance): void {
         		$this->importance = $importance;
         	}

	/**
	 * @return string
	 */
	public function getTypeCyclone(): string {
         		return $this->typeCyclone;
         	}

	/**
	 * @param string $typeCyclone
	 */
	public function setTypeCyclone(string $typeCyclone): void {
         		$this->typeCyclone = $typeCyclone;
         	}

	/**
	 * @return bool
	 */
	public function isHasImageCyclone() {
         		return $this->hasImageCyclone;
         	}

	/**
	 * @param bool $hasImageCyclone
	 */
	public function setHasImageCyclone($hasImageCyclone): void {
         		$this->hasImageCyclone = $hasImageCyclone;
         	}

	/**
	 * @return \DateTime
	 */
	public function getDateDeb(): \DateTime {
         		return $this->dateDeb;
         	}

	/**
	 * @param \DateTime $dateDeb
	 */
	public function setDateDeb(\DateTime $dateDeb): void {
         		$this->dateDeb = $dateDeb;
         	}

	/**
	 * @return \DateTime
	 */
	public function getDateFin(): \DateTime {
         		return $this->dateFin;
         	}

	/**
	 * @param \DateTime $dateFin
	 */
	public function setDateFin(\DateTime $dateFin): void {
         		$this->dateFin = $dateFin;
         	}

	/**
	 * @return bool
	 */
	public function isDuree(): bool {
         		return $this->duree;
         	}

	/**
	 * @param bool $duree
	 */
	public function setDuree(bool $duree): void {
         		$this->duree = $duree;
         	}

	/**
	 * @return string
	 */
	public function getType(): string {
         		return $this->type;
         	}

	/**
	 * @param string $type
	 */
	public function setType(string $type): void {
         		$this->type = $type;
         	}

	/**
	 * @return string
	 */
	public function getDescription(): string {
         		return $this->description;
         	}

	/**
	 * @param string $description
	 */
	public function setDescription(string $description): void {
         		$this->description = $description;
         	}

	/**
	 * @return string
	 */
	public function getShortDesc(): string {
         		return $this->shortDesc;
         	}

	/**
	 * @param string $shortDesc
	 */
	public function setShortDesc(string $shortDesc): void {
         		$this->shortDesc = $shortDesc;
         	}

	/**
	 * @return string
	 */
	public function getSources(): string {
         		return $this->sources;
         	}

	/**
	 * @param string $sources
	 */
	public function setSources(string $sources): void {
         		$this->sources = $sources;
         	}

	/**
	 * @return int
	 */
	public function getIdCompte(): int {
         		return $this->idCompte;
         	}

	/**
	 * @param int $idCompte
	 */
	public function setIdCompte(int $idCompte): void {
         		$this->idCompte = $idCompte;
         	}

	/**
	 * @return float
	 */
	public function getValeurMax(): float {
         		return $this->valeurMax;
         	}

	/**
	 * @param float $valeurMax
	 */
	public function setValeurMax(float $valeurMax): void {
         		$this->valeurMax = $valeurMax;
         	}

	/**
	 * @return int
	 */
	public function getBsLink(): int {
         		return $this->bsLink;
         	}

	/**
	 * @param int $bsLink
	 */
	public function setBsLink(int $bsLink): void {
         		$this->bsLink = $bsLink;
         	}

	/**
	 * @return bool
	 */
	public function isGenCartes() {
         		return $this->genCartes;
         	}

	/**
	 * @param bool $genCartes
	 */
	public function setGenCartes($genCartes): void {
         		$this->genCartes = $genCartes;
         	}

	/**
	 * @return string
	 */
	public function getWhy(): string {
         		return $this->why;
         	}

	/**
	 * @param string $why
	 */
	public function setWhy(string $why): void {
         		$this->why = $why;
         	}

	/**
	 * @return string
	 */
	public function getTableauCroise(): string {
         		return $this->tableauCroise;
         	}

	/**
	 * @param string $tableauCroise
	 */
	public function setTableauCroise(string $tableauCroise): void {
         		$this->tableauCroise = $tableauCroise;
         	}

	/**
	 * @return string
	 */
	public function getTableauCroiseCyclone(): string {
         		return $this->tableauCroiseCyclone;
         	}

	/**
	 * @param string $tableauCroiseCyclone
	 */
	public function setTableauCroiseCyclone(string $tableauCroiseCyclone): void {
         		$this->tableauCroiseCyclone = $tableauCroiseCyclone;
         	}

	/**
	 * @return int
	 */
	public function getHits() {
         		return $this->hits;
         	}

	/**
	 * @param int $hits
	 */
	public function setHits($hits): void {
         		$this->hits = $hits;
         	}

	/**
	 * @return string
	 */
	public function getNotes(): string {
         		return $this->notes;
         	}

	/**
	 * @param string $notes
	 */
	public function setNotes(string $notes): void {
         		$this->notes = $notes;
         	}

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
