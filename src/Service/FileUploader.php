<?php

namespace App\Service;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    //définit dans service.yaml
    private $targetDirectory;//chemin où le fichier uploadé sera stocké 
    private $slugger;
    public function __construct($targetDirectory, SluggerInterface $slugger)
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
    }
    public function upload(UploadedFile $file)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            //si il y a une erreur; par exemple un droit écriture non autorisé vers le dossier de destination
            return null;
        }
        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    public function formattageDate($date)
    {
        if ($date=='' || is_null($date) || !is_float($date) || !is_int($date))
        {
            return null;
        } else {
            $timestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($date);
            $datetime = new \DateTime();
            $datetime->setTimestamp($timestamp);
            return $datetime; // affiche la date formatée
        }
    }//fin formattagedate
}