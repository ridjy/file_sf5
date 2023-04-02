<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use App\Form\ExcelType;
use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Entity\ClientsAPV;

class ImportController extends AbstractController
{
    private $em;
    public function __construct()
    {
        $this->em = $this->getDoctrine()->getManager();
    }

    #[Route('/', name: 'app_import')]
    public function index(Request $request, FileUploader $file_uploader): Response
    {
        $form = $this->createForm(ExcelType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $file = $form['fichier']->getData();
            if ($file) 
            {
                $file_name = $file_uploader->upload($file);
                if (null !== $file_name) // for example
                {
                $directory = $file_uploader->getTargetDirectory();
                $full_path = $directory.'/'.$file_name;
                // Do what you want with the full path file...
                // Why not read the content or parse it !!!
                $this->insertionEnBase($full_path);
                }
                else
                {
                    // Oups, an error occured !!!
                }
            }
        }
        return $this->render('import/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }//fin index

    private function insertionEnBase(string $full_path) : boolval
    {
        $reader = new Xlsx();
        // Tell the reader to only read the data. Ignore formatting etc.
        $reader->setReadDataOnly(true);

        // Read the spreadsheet file.
        $spreadsheet = $reader->load($full_path);

        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        //améliorer la preformance dans une 2e version en lisant ligne par ligne le fichier
        $data = $sheet->toArray();

        //traitement des données du fichier excel
        //verification du format sinon erreur
        $row = 0; 
        foreach ($data as $valeur)
        {
            if ($row==0) { continue; }//1ère ligne entête
            $client = new ClientsAPV();
            $client->setCompteAffaire($valeur[0]);
            $client->setCompteEvenement($valeur[1]);
            $client->setCompteDerniereEvenement($valeur[2]);
            $client->setNumeroFiche($valeur[3]);
            $client->setLibelleCivilite($valeur[4]);
            $client->setProprietaireActuelVehicule($valeur[5]);
            $client->setNom($valeur[6]);
            $client->setPrenom($valeur[7]);
            $client->setNumEtNomVoie($valeur[8]);
            $client->setComplementAdresse1($valeur[9]);
            $client->setCodePostal($valeur[10]);
            $client->setVille($valeur[11]);
            $client->setTelephoneDomicile($valeur[12]);
            $client->setTelephonePortable($valeur[13]);
            $client->setTelephoneJob($valeur[14]);
            $client->setEmail($valeur[15]);
            $client->setDateMiseEnCirculation($valeur[16]);
            $client->setDateAchat($valeur[17]);
            $client->setDateDerniereEvenement($valeur[18]);
            $client->setLibelleMarque($valeur[19]);
            $client->setLibelleModele($valeur[20]);
            $client->setVersion($valeur[21]);
            $client->setVIN($valeur[22]);
            $client->setImmatriculation($valeur[23]);
            $client->setTypeProspect($valeur[24]);
            $client->setKilométrage($valeur[25]);
            $client->setLibelleEnergie($valeur[26]);
            $client->setVendeurVN($valeur[27]);
            $client->setVendeurVO($valeur[28]);
            $client->setCommentaireFacturation($valeur[29]);
            $client->setTypeVNVO($valeur[30]);
            $client->setNumDossierVNVO($valeur[31]);
            $client->setIntermediaireVenteVN($valeur[32]);
            $client->setDateEvenement($valeur[33]);
            $client->setOrigineEvenement($valeur[34]);
            $this->em->persist($client);
            $this->em->flush($client);
            unset($client);
        }
    }

}
