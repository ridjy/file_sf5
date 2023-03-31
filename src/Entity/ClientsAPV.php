<?php

namespace App\Entity;

use App\Repository\ClientsAPVRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsAPVRepository::class)]
class ClientsAPV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $CompteAffaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompteEvenement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompteDerniereEvenement = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $NumeroFiche = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $LibelleCivilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ProprietaireActuelVehicule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NumEtNomVoie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ComplementAdresse1 = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $CodePostal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Ville = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $TelephoneDomicile = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $TelephonePortable = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $TelephoneJob = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateMiseEnCirculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateAchat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateDerniereEvenement = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $LibelleMarque = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $LibelleModele = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VIN = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Immatriculation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $TypeProspect = null;

    #[ORM\Column(nullable: true)]
    private ?int $Kilométrage = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $LibelleEnergie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VendeurVN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VendeurVO = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $CommentaireFacturation = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $TypeVNVO = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $NumDossierVNVO = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $IntermediaireVenteVN = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateEvenement = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $OrigineEvenement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompteAffaire(): ?string
    {
        return $this->CompteAffaire;
    }

    public function setCompteAffaire(string $CompteAffaire): self
    {
        $this->CompteAffaire = $CompteAffaire;

        return $this;
    }

    public function getCompteEvenement(): ?string
    {
        return $this->CompteEvenement;
    }

    public function setCompteEvenement(?string $CompteEvenement): self
    {
        $this->CompteEvenement = $CompteEvenement;

        return $this;
    }

    public function getCompteDerniereEvenement(): ?string
    {
        return $this->CompteDerniereEvenement;
    }

    public function setCompteDerniereEvenement(?string $CompteDerniereEvenement): self
    {
        $this->CompteDerniereEvenement = $CompteDerniereEvenement;

        return $this;
    }

    public function getNumeroFiche(): ?string
    {
        return $this->NumeroFiche;
    }

    public function setNumeroFiche(?string $NumeroFiche): self
    {
        $this->NumeroFiche = $NumeroFiche;

        return $this;
    }

    public function getLibelleCivilite(): ?string
    {
        return $this->LibelleCivilite;
    }

    public function setLibelleCivilite(?string $LibelleCivilite): self
    {
        $this->LibelleCivilite = $LibelleCivilite;

        return $this;
    }

    public function getProprietaireActuelVehicule(): ?string
    {
        return $this->ProprietaireActuelVehicule;
    }

    public function setProprietaireActuelVehicule(?string $ProprietaireActuelVehicule): self
    {
        $this->ProprietaireActuelVehicule = $ProprietaireActuelVehicule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNumEtNomVoie(): ?string
    {
        return $this->NumEtNomVoie;
    }

    public function setNumEtNomVoie(?string $NumEtNomVoie): self
    {
        $this->NumEtNomVoie = $NumEtNomVoie;

        return $this;
    }

    public function getComplementAdresse1(): ?string
    {
        return $this->ComplementAdresse1;
    }

    public function setComplementAdresse1(?string $ComplementAdresse1): self
    {
        $this->ComplementAdresse1 = $ComplementAdresse1;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(?string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->TelephoneDomicile;
    }

    public function setTelephoneDomicile(?string $TelephoneDomicile): self
    {
        $this->TelephoneDomicile = $TelephoneDomicile;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->TelephonePortable;
    }

    public function setTelephonePortable(?string $TelephonePortable): self
    {
        $this->TelephonePortable = $TelephonePortable;

        return $this;
    }

    public function getTelephoneJob(): ?string
    {
        return $this->TelephoneJob;
    }

    public function setTelephoneJob(?string $TelephoneJob): self
    {
        $this->TelephoneJob = $TelephoneJob;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDateMiseEnCirculation(): ?\DateTimeInterface
    {
        return $this->DateMiseEnCirculation;
    }

    public function setDateMiseEnCirculation(?\DateTimeInterface $DateMiseEnCirculation): self
    {
        $this->DateMiseEnCirculation = $DateMiseEnCirculation;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->DateAchat;
    }

    public function setDateAchat(?\DateTimeInterface $DateAchat): self
    {
        $this->DateAchat = $DateAchat;

        return $this;
    }

    public function getDateDerniereEvenement(): ?\DateTimeInterface
    {
        return $this->DateDerniereEvenement;
    }

    public function setDateDerniereEvenement(?\DateTimeInterface $DateDerniereEvenement): self
    {
        $this->DateDerniereEvenement = $DateDerniereEvenement;

        return $this;
    }

    public function getLibelleMarque(): ?string
    {
        return $this->LibelleMarque;
    }

    public function setLibelleMarque(?string $LibelleMarque): self
    {
        $this->LibelleMarque = $LibelleMarque;

        return $this;
    }

    public function getLibelleModele(): ?string
    {
        return $this->LibelleModele;
    }

    public function setLibelleModele(?string $LibelleModele): self
    {
        $this->LibelleModele = $LibelleModele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->Version;
    }

    public function setVersion(?string $Version): self
    {
        $this->Version = $Version;

        return $this;
    }

    public function getVIN(): ?string
    {
        return $this->VIN;
    }

    public function setVIN(?string $VIN): self
    {
        $this->VIN = $VIN;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->Immatriculation;
    }

    public function setImmatriculation(?string $Immatriculation): self
    {
        $this->Immatriculation = $Immatriculation;

        return $this;
    }

    public function getTypeProspect(): ?string
    {
        return $this->TypeProspect;
    }

    public function setTypeProspect(?string $TypeProspect): self
    {
        $this->TypeProspect = $TypeProspect;

        return $this;
    }

    public function getKilométrage(): ?int
    {
        return $this->Kilométrage;
    }

    public function setKilométrage(?int $Kilométrage): self
    {
        $this->Kilométrage = $Kilométrage;

        return $this;
    }

    public function getLibelleEnergie(): ?string
    {
        return $this->LibelleEnergie;
    }

    public function setLibelleEnergie(?string $LibelleEnergie): self
    {
        $this->LibelleEnergie = $LibelleEnergie;

        return $this;
    }

    public function getVendeurVN(): ?string
    {
        return $this->VendeurVN;
    }

    public function setVendeurVN(?string $VendeurVN): self
    {
        $this->VendeurVN = $VendeurVN;

        return $this;
    }

    public function getVendeurVO(): ?string
    {
        return $this->VendeurVO;
    }

    public function setVendeurVO(?string $VendeurVO): self
    {
        $this->VendeurVO = $VendeurVO;

        return $this;
    }

    public function getCommentaireFacturation(): ?string
    {
        return $this->CommentaireFacturation;
    }

    public function setCommentaireFacturation(?string $CommentaireFacturation): self
    {
        $this->CommentaireFacturation = $CommentaireFacturation;

        return $this;
    }

    public function getTypeVNVO(): ?string
    {
        return $this->TypeVNVO;
    }

    public function setTypeVNVO(?string $TypeVNVO): self
    {
        $this->TypeVNVO = $TypeVNVO;

        return $this;
    }

    public function getNumDossierVNVO(): ?string
    {
        return $this->NumDossierVNVO;
    }

    public function setNumDossierVNVO(?string $NumDossierVNVO): self
    {
        $this->NumDossierVNVO = $NumDossierVNVO;

        return $this;
    }

    public function getIntermediaireVenteVN(): ?string
    {
        return $this->IntermediaireVenteVN;
    }

    public function setIntermediaireVenteVN(?string $IntermediaireVenteVN): self
    {
        $this->IntermediaireVenteVN = $IntermediaireVenteVN;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->DateEvenement;
    }

    public function setDateEvenement(?\DateTimeInterface $DateEvenement): self
    {
        $this->DateEvenement = $DateEvenement;

        return $this;
    }

    public function getOrigineEvenement(): ?string
    {
        return $this->OrigineEvenement;
    }

    public function setOrigineEvenement(?string $OrigineEvenement): self
    {
        $this->OrigineEvenement = $OrigineEvenement;

        return $this;
    }
}
