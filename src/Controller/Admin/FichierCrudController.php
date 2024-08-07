<?php

namespace App\Controller\Admin;

use App\Entity\Fichier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class FichierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fichier::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new("imageFile", "Upload")
            ->setFormType(VichImageType::class)
            ->onlyOnForms(),
            ImageField::new("imageName", "Fichier")
            ->setBasePath("http://127.0.0.1:9000/fichier/")
            ->hideOnForm()
        ];
    }
    
}
