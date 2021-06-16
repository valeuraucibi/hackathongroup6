<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoricValues
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
 *     "id": "exact", "id_historic": "exact", "lieu": "partial", "geoid": "exact", "dept": "exact", "pays": "partial",
 *     "valeur": "exact", "type": "exact", "date": "exact"
 * })
 * @ApiFilter(BooleanFilter::class, properties={"est_record", "est_record_dpt"})
 * @ORM\Table(name="historic_values", uniqueConstraints={@ORM\UniqueConstraint(name="doublons", columns={"date", "geoid", "type", "id_historic"})}, indexes={@ORM\Index(name="geoid", columns={"geoid"}), @ORM\Index(name="id_historic", columns={"id_historic", "dept"})})
 * @ORM\Entity
 */
class HistoricValues
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_historic", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idHistoric;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var int
     *
     * @ORM\Column(name="geoid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $geoid;

    /**
     * @var string
     *
     * @ORM\Column(name="dept", type="string", length=255, nullable=false)
     */
    private $dept;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=false)
     */
    private $commentaire;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_record", type="boolean", nullable=false)
     */
    private $estRecord = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="est_record_dpt", type="boolean", nullable=false)
     */
    private $estRecordDpt = '0';

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
	 * @return int
	 */
	public function getIdHistoric(): int {
		return $this->idHistoric;
	}

	/**
	 * @param int $idHistoric
	 */
	public function setIdHistoric(int $idHistoric): void {
		$this->idHistoric = $idHistoric;
	}

	/**
	 * @return string
	 */
	public function getLieu(): string {
		return $this->lieu;
	}

	/**
	 * @param string $lieu
	 */
	public function setLieu(string $lieu): void {
		$this->lieu = $lieu;
	}

	/**
	 * @return int
	 */
	public function getGeoid(): int {
		return $this->geoid;
	}

	/**
	 * @param int $geoid
	 */
	public function setGeoid(int $geoid): void {
		$this->geoid = $geoid;
	}

	/**
	 * @return string
	 */
	public function getDept(): string {
		return $this->dept;
	}

	/**
	 * @param string $dept
	 */
	public function setDept(string $dept): void {
		$this->dept = $dept;
	}

	/**
	 * @return string
	 */
	public function getPays(): string {
		return $this->pays;
	}

	/**
	 * @param string $pays
	 */
	public function setPays(string $pays): void {
		$this->pays = $pays;
	}

	/**
	 * @return float
	 */
	public function getValeur(): float {
		return $this->valeur;
	}

	/**
	 * @param float $valeur
	 */
	public function setValeur(float $valeur): void {
		$this->valeur = $valeur;
	}

	/**
	 * @return bool
	 */
	public function isType(): bool {
		return $this->type;
	}

	/**
	 * @param bool $type
	 */
	public function setType(bool $type): void {
		$this->type = $type;
	}

	/**
	 * @return \DateTime
	 */
	public function getDate(): \DateTime {
		return $this->date;
	}

	/**
	 * @param \DateTime $date
	 */
	public function setDate(\DateTime $date): void {
		$this->date = $date;
	}

	/**
	 * @return string
	 */
	public function getCommentaire(): string {
		return $this->commentaire;
	}

	/**
	 * @param string $commentaire
	 */
	public function setCommentaire(string $commentaire): void {
		$this->commentaire = $commentaire;
	}

	/**
	 * @return bool
	 */
	public function isEstRecord() {
		return $this->estRecord;
	}

	/**
	 * @param bool $estRecord
	 */
	public function setEstRecord($estRecord): void {
		$this->estRecord = $estRecord;
	}

	/**
	 * @return bool
	 */
	public function isEstRecordDpt() {
		return $this->estRecordDpt;
	}

	/**
	 * @param bool $estRecordDpt
	 */
	public function setEstRecordDpt($estRecordDpt): void {
		$this->estRecordDpt = $estRecordDpt;
	}
}
