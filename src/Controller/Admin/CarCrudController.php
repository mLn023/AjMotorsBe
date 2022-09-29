<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Voitures")
            ->setEntityLabelInSingular("Voiture");

    }

    
    
     
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')                          ->hideOnForm()                      ->hideOnIndex(),
            TextField::new('Brand')                     ->setLabel('Marque'),
            TextField::new('Model')                     ->setLabel('Modèle'),
            AssociationField::new('Category')           ->setLabel('Catégorie'),
            IntegerField::new('Price')                  ->setLabel('Prix'),
            DateField::new('createdAt')                 ->setLabel('Date de création')->hideOnForm(),
            DateField::new('First_Registration')        ->setLabel('Date de mise en circulation')    ->hideOnIndex(),
            DateField::new('Technical_Control')         ->setLabel('Date du controle tech.')     ->hideOnIndex(),
            IntegerField::new('Mileage')                ->setLabel('Kilomètrage')               ->hideOnIndex(),
            TextField::new('Energy')                    ->setLabel('Energie')                ->hideOnIndex(),
            TextField::new('Gearbox')                   ->setLabel('Boite de vitesse')               ->hideOnIndex(),
            TextField::new('Color_outside')             ->setLabel('Couleur exterieur')         ->hideOnIndex(),
            TextField::new('Color_inside')              ->setLabel('Couleur intérieur')          ->hideOnIndex(),
            IntegerField::new('Num_of_Seats')           ->setLabel('Nombre de sièges')       ->hideOnIndex(),
            IntegerField::new('Num_of_Doors')           ->setLabel('Nombre de porte')       ->hideOnIndex(),
            BooleanField::new('isFirstHand')            ->setLabel('Première main?')     ->hideOnIndex(),
            IntegerField::new('FiscalPower')            ->setLabel('Puissance Fiscale')          ->hideOnIndex(),
            IntegerField::new('HorsePower')             ->setLabel('Puissance')           ->hideOnIndex(),
            NumberField::new('CO2_Emission')            ->setLabel('Emission de C.O²')          ->hideOnIndex(),
            NumberField::new('Consumption')             ->setLabel('Consomation')           ->hideOnIndex()
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Car) return;

        $entityInstance->setCreatedAt(new DateTime('now'));

        parent::persistEntity($entityManager, $entityInstance);
    }
    
}
