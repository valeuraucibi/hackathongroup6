<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoricNormales
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
 *     "geoid": "exact", "mois": "exact", "tx": "exact", "tn": "exact", "precip": "exact", "altitude_ref": "exact", "nom_ref": "partial",
 *     "dept_ref": "exact", "distance": "exact", "wmo_ref": "partial"
 * })
 * @ORM\Table(name="historic_normales")
 * @ORM\Entity
 */
class HistoricNormales
{
    /**
     * @var int
     *
     * @ORM\Column(name="geoid", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $geoid;

    /**
     * @var int
     *
     * @ORM\Column(name="mois", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $mois;

    /**
     * @var float
     *
     * @ORM\Column(name="tx", type="float", precision=10, scale=0, nullable=false)
     */
    private $tx;

    /**
     * @var float
     *
     * @ORM\Column(name="tn", type="float", precision=10, scale=0, nullable=false)
     */
    private $tn;

    /**
     * @var float
     *
     * @ORM\Column(name="precip", type="float", precision=10, scale=0, nullable=false)
     */
    private $precip;

    /**
     * @var float
     *
     * @ORM\Column(name="altitude_ref", type="float", precision=10, scale=0, nullable=false)
     */
    private $altitudeRef;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ref", type="string", length=100, nullable=false)
     */
    private $nomRef;

    /**
     * @var string
     *
     * @ORM\Column(name="dept_ref", type="string", length=3, nullable=false)
     */
    private $deptRef;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float", precision=10, scale=0, nullable=false)
     */
    private $distance;

    /**
     * @var string
     *
     * @ORM\Column(name="wmo_ref", type="string", length=50, nullable=false)
     */
    private $wmoRef;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="favoriteHistoricNormale")
     */
    private $user;

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
	 * @return int
	 */
	public function getMois(): int {
         		return $this->mois;
         	}

	/**
	 * @param int $mois
	 */
	public function setMois(int $mois): void {
         		$this->mois = $mois;
         	}

	/**
	 * @return float
	 */
	public function getTx(): float {
         		return $this->tx;
         	}

	/**
	 * @param float $tx
	 */
	public function setTx(float $tx): void {
         		$this->tx = $tx;
         	}

	/**
	 * @return float
	 */
	public function getTn(): float {
         		return $this->tn;
         	}

	/**
	 * @param float $tn
	 */
	public function setTn(float $tn): void {
         		$this->tn = $tn;
         	}

	/**
	 * @return float
	 */
	public function getPrecip(): float {
         		return $this->precip;
         	}

	/**
	 * @param float $precip
	 */
	public function setPrecip(float $precip): void {
         		$this->precip = $precip;
         	}

	/**
	 * @return float
	 */
	public function getAltitudeRef(): float {
         		return $this->altitudeRef;
         	}

	/**
	 * @param float $altitudeRef
	 */
	public function setAltitudeRef(float $altitudeRef): void {
         		$this->altitudeRef = $altitudeRef;
         	}

	/**
	 * @return string
	 */
	public function getNomRef(): string {
         		return $this->nomRef;
         	}

	/**
	 * @param string $nomRef
	 */
	public function setNomRef(string $nomRef): void {
         		$this->nomRef = $nomRef;
         	}

	/**
	 * @return string
	 */
	public function getDeptRef(): string {
         		return $this->deptRef;
         	}

	/**
	 * @param string $deptRef
	 */
	public function setDeptRef(string $deptRef): void {
         		$this->deptRef = $deptRef;
         	}

	/**
	 * @return float
	 */
	public function getDistance(): float {
         		return $this->distance;
         	}

	/**
	 * @param float $distance
	 */
	public function setDistance(float $distance): void {
         		$this->distance = $distance;
         	}

	/**
	 * @return string
	 */
	public function getWmoRef(): string {
         		return $this->wmoRef;
         	}

	/**
	 * @param string $wmoRef
	 */
	public function setWmoRef(string $wmoRef): void {
         		$this->wmoRef = $wmoRef;
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
