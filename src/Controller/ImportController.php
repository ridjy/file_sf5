<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\FileUploader;
use App\Form\ExcelType;

class ImportController extends AbstractController
{
    #[Route('/import', name: 'app_import')]
    public function index(): Response
    {
        return $this->render('import/index.html.twig', [
            'controller_name' => 'ImportController',
        ]);
    }

    #[Route('/upload', name: 'app_upload')]
    public function uploadAction(Request $request, FileUploader $file_uploader)
    {
        $form = $this->createForm(ExcelType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $file = $form['upload_file']->getData();
            if ($file) 
            {
                $file_name = $file_uploader->upload($file);
                if (null !== $file_name) // for example
                {
                $directory = $file_uploader->getTargetDirectory();
                $full_path = $directory.'/'.$file_name;
                // Do what you want with the full path file...
                // Why not read the content or parse it !!!
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
    }
}
