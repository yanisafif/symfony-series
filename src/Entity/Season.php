<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeasonRepository::class)
 */
class Season
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
    private $number;

    /**
     * @ORM\Column(type="date")
     */
    private $firstAirDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $overview;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poster;

    /**
     * @ORM\Column(type="integer")
     */
    private $tmdbId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModified;

    /**
     * @ORM\ManyToOne(targetEntity=Serie::class, inversedBy="seasons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $serie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getFirstAirDate(): ?\DateTimeInterface
    {
        return $this->firstAirDate;
    }

    public function setFirstAirDate(\DateTimeInterface $firstAirDate): self
    {
        $this->firstAirDate = $firstAirDate;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(?string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getTmdbId(): ?int
    {
        return $this->tmdbId;
    }

    public function setTmdbId(int $tmdbId): self
    {
        $this->tmdbId = $tmdbId;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDateModified(?\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    public function getSerie(): ?Serie
    {
        return $this->serie;
    }

    public function setSerie(?Serie $serie): self
    {
        $this->serie = $serie;

        return $this;
    }























    /*
     * php bin/console make:entity Season
 created: src/Entity/Season.php
 created: src/Repository/SeasonRepository.php

 Entity generated! Now let's add some fields!
 You can always add more fields later manually or by re-running this command.

 New property name (press <return> to stop adding fields):
 > number

 Field type (enter ? to see all types) [string]:
 > integer

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > firstAirDate

 Field type (enter ? to see all types) [string]:
 > date

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > overview

 Field type (enter ? to see all types) [string]:
 > text

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > poster

 Field type (enter ? to see all types) [string]:
 >

 Field length [255]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > tmdbId

 Field type (enter ? to see all types) [integer]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > dateCreated

 Field type (enter ? to see all types) [string]:
 > datetime

 Can this field be null in the database (nullable) (yes/no) [no]:
 >

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 > dateModified

 Field type (enter ? to see all types) [string]:
 > datetime

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Season.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >



  Success!


 Next: When you're ready, create a migration with php bin/console make:migration

[colapy@colapy-systemproductname monProjet]$ php bin/console make:entity Season

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > serie

 Field type (enter ? to see all types) [string]:
 > relation

 What class should this entity be related to?:
 > Serie

What type of relationship is this?
 ------------ -------------------------------------------------------------------
  Type         Description
 ------------ -------------------------------------------------------------------
  ManyToOne    Each Season relates to (has) one Serie.
               Each Serie can relate to (can have) many Season objects

  OneToMany    Each Season can relate to (can have) many Serie objects.
               Each Serie relates to (has) one Season

  ManyToMany   Each Season can relate to (can have) many Serie objects.
               Each Serie can also relate to (can also have) many Season objects

  OneToOne     Each Season relates to (has) exactly one Serie.
               Each Serie also relates to (has) exactly one Season.
 ------------ -------------------------------------------------------------------

 Relation type? [ManyToOne, OneToMany, ManyToMany, OneToOne]:
 > ManyToOne

 Is the Season.serie property allowed to be null (nullable)? (yes/no) [yes]:
 > no

 Do you want to add a new property to Serie so that you can access/update Season objects from it - e.g. $serie->getSeasons()? (yes/no) [yes]:
 >

 A new property will also be added to the Serie class so that you can access the related Season objects from it.

 New field name inside Serie [seasons]:
 >

 Do you want to activate orphanRemoval on your relationship?
 A Season is "orphaned" when it is removed from its related Serie.
 e.g. $serie->removeSeason($season)

 NOTE: If a Season may *change* from one Serie to another, answer "no".

 Do you want to automatically delete orphaned App\Entity\Season objects (orphanRemoval)? (yes/no) [no]:
 >

 updated: src/Entity/Season.php
 updated: src/Entity/Serie.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >



  Success!


 Next: When you're ready, create a migration with php bin/console make:migration

[colapy@colapy-systemproductname monProjet]$

     */
}
