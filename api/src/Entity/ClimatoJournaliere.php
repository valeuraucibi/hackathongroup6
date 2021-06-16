<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * ClimatoJournaliere
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
 *     "idStation": "exact", "annee": "partial"
 * })
 * @ApiFilter(BooleanFilter::class, properties={"jour", "mois", "tn", "tx", "rr", "ens"})
 * @ORM\Table(name="climato_journaliere", indexes={@ORM\Index(name="tx", columns={"tx"}), @ORM\Index(name="mois", columns={"mois"}), @ORM\Index(name="rr", columns={"rr"}), @ORM\Index(name="annee", columns={"annee"}), @ORM\Index(name="id_station", columns={"id_station"}), @ORM\Index(name="ymd", columns={"annee", "mois", "jour"}), @ORM\Index(name="tn", columns={"tn"}), @ORM\Index(name="jour", columns={"jour"})})
 * @ORM\Entity
 */
class ClimatoJournaliere
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_station", type="string", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idStation;

    /**
     * @var bool
     *
     * @ORM\Column(name="jour", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $jour;

    /**
     * @var bool
     *
     * @ORM\Column(name="mois", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="smallint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annee;

    /**
     * @var float|null
     *
     * @ORM\Column(name="tn", type="float", precision=10, scale=0, nullable=true)
     */
    private $tn;

    /**
     * @var float|null
     *
     * @ORM\Column(name="tx", type="float", precision=10, scale=0, nullable=true)
     */
    private $tx;

    /**
     * @var float|null
     *
     * @ORM\Column(name="rr", type="float", precision=10, scale=0, nullable=true)
     */
    private $rr;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ens", type="float", precision=10, scale=0, nullable=true)
     */
    private $ens;

	/**
	 * @return string
	 */
	public function getIdStation(): string {
		return $this->idStation;
	}

	/**
	 * @param string $idStation
	 */
	public function setIdStation(string $idStation): void {
		$this->idStation = $idStation;
	}

	/**
	 * @return bool
	 */
	public function isJour(): bool {
		return $this->jour;
	}

	/**
	 * @param bool $jour
	 */
	public function setJour(bool $jour): void {
		$this->jour = $jour;
	}

	/**
	 * @return bool
	 */
	public function isMois(): bool {
		return $this->mois;
	}

	/**
	 * @param bool $mois
	 */
	public function setMois(bool $mois): void {
		$this->mois = $mois;
	}

	/**
	 * @return int
	 */
	public function getAnnee(): int {
		return $this->annee;
	}

	/**
	 * @param int $annee
	 */
	public function setAnnee(int $annee): void {
		$this->annee = $annee;
	}

	/**
	 * @return float|null
	 */
	public function getTn(): ?float {
		return $this->tn;
	}

	/**
	 * @param float|null $tn
	 */
	public function setTn(?float $tn): void {
		$this->tn = $tn;
	}

	/**
	 * @return float|null
	 */
	public function getTx(): ?float {
		return $this->tx;
	}

	/**
	 * @param float|null $tx
	 */
	public function setTx(?float $tx): void {
		$this->tx = $tx;
	}

	/**
	 * @return float|null
	 */
	public function getRr(): ?float {
		return $this->rr;
	}

	/**
	 * @param float|null $rr
	 */
	public function setRr(?float $rr): void {
		$this->rr = $rr;
	}

	/**
	 * @return float|null
	 */
	public function getEns(): ?float {
		return $this->ens;
	}

	/**
	 * @param float|null $ens
	 */
	public function setEns(?float $ens): void {
		$this->ens = $ens;
	}

}
