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
use App\Repository\ClientsAPVRepository;
use Doctrine\Persistence\ManagerRegistry;

class ImportController extends AbstractController
{
    #[Route('/', name: 'app_import')]
    public function index(Request $request, FileUploader $file_uploader, ClientsAPVRepository $clientRepository): Response
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
                $this->insertionEnBase($full_path,$clientRepository,$file_uploader);
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

    private function insertionEnBase(string $full_path, $clientRepository,$file_uploader) : bool
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
            if ($row==0) { $row++;continue; }//1ère ligne entête
            $o_client = new ClientsAPV();
            $o_client->setCompteAffaire($valeur[0]);
            $o_client->setCompteEvenement($valeur[1]);
            $o_client->setCompteDerniereEvenement($valeur[2]);
            $o_client->setNumeroFiche($valeur[3]);
            $o_client->setLibelleCivilite($valeur[4]);
            $o_client->setProprietaireActuelVehicule($valeur[5]);
            $o_client->setNom($valeur[6]);
            $o_client->setPrenom($valeur[7]);
            $o_client->setNumEtNomVoie($valeur[8]);
            $o_client->setComplementAdresse1($valeur[9]);
            $o_client->setCodePostal($valeur[10]);
            $o_client->setVille($valeur[11]);
            $o_client->setTelephoneDomicile($valeur[12]);
            $o_client->setTelephonePortable($valeur[13]);
            $o_client->setTelephoneJob($valeur[14]);
            $o_client->setEmail($valeur[15]);
            $o_client->setDateMiseEnCirculation($file_uploader->formattageDate($valeur[16]));//false si vide
            $o_client->setDateAchat($file_uploader->formattageDate($valeur[17]));
            $o_client->setDateDerniereEvenement($file_uploader->formattageDate($valeur[18]));
            $o_client->setLibelleMarque($valeur[19]);
            $o_client->setLibelleModele($valeur[20]);
            $o_client->setVersion($valeur[21]);
            $o_client->setVIN($valeur[22]);
            $o_client->setImmatriculation($valeur[23]);
            $o_client->setTypeProspect($valeur[24]);
            $o_client->setKilométrage($valeur[25]);
            $o_client->setLibelleEnergie($valeur[26]);
            $o_client->setVendeurVN($valeur[27]);
            $o_client->setVendeurVO($valeur[28]);
            $o_client->setCommentaireFacturation($valeur[29]);
            $o_client->setTypeVNVO($valeur[30]);
            $o_client->setNumDossierVNVO($valeur[31]);
            $o_client->setIntermediaireVenteVN($valeur[32]);
            $o_client->setDateEvenement($file_uploader->formattageDate($valeur[33]));
            $o_client->setOrigineEvenement($valeur[34]);
            $clientRepository->save($o_client,true);//on flush directement
            unset($o_client);
            $row++;
        }
        return true;
    }//fin insertion


}
