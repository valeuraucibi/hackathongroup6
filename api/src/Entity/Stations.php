<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stations
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
 *     "uniqueid": "exact", "id": "exact", "libelle": "partial", "latitude": "exact", "longitude": "exact", "altitude": "exact", "pays": "partial"
 * })
 * @ORM\Table(name="stations", uniqueConstraints={@ORM\UniqueConstraint(name="uniqueke", columns={"id"})}, indexes={@ORM\Index(name="pays", columns={"pays"}), @ORM\Index(name="base_climato", columns={"base_climato"}), @ORM\Index(name="longitude", columns={"longitude"}), @ORM\Index(name="station_reference", columns={"station_reference"}), @ORM\Index(name="libelle", columns={"libelle"}), @ORM\Index(name="departement", columns={"departement"}), @ORM\Index(name="pas_de_synop", columns={"pas_de_synop"}), @ORM\Index(name="climato_only", columns={"climato_only"}), @ORM\Index(name="latitude", columns={"latitude"})})
 * @ORM\Entity
 */
class Stations
{
    /**
     * @var int
     *
     * @ORM\Column(name="uniqueid", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uniqueid;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=15, nullable=false, options={"fixed"=true})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=0, nullable=false)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $pays = '';

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitude = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitude = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="altitude", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $altitude = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="orientation", type="boolean", nullable=false)
     */
    private $orientation;

    /**
     * @var string
     *
     * @ORM\Column(name="station_reference", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $stationReference;

    /**
     * @var int
     *
     * @ORM\Column(name="pas_de_synop", type="smallint", nullable=false, options={"comment"="si la station est un metar et qu'il n'existe pas de synop, champ à 1"})
     */
    private $pasDeSynop = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="climato_only", type="boolean", nullable=false)
     */
    private $climatoOnly = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dh_min_climato", type="date", nullable=true)
     */
    private $dhMinClimato;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dh_min_live", type="date", nullable=true)
     */
    private $dhMinLive;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dh_ouverture", type="date", nullable=true)
     */
    private $dhOuverture;

    /**
     * @var bool
     *
     * @ORM\Column(name="base_climato", type="boolean", nullable=false)
     */
    private $baseClimato = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_report", type="datetime", nullable=false)
     */
    private $lastReport;

    /**
     * @var string
     *
     * @ORM\Column(name="last_data", type="string", length=255, nullable=false)
     */
    private $lastData;


}
