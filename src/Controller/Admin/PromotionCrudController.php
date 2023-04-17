<?php

namespace App\Controller\Admin;

use App\Entity\Promotion;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PercentField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PromotionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Promotion::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            PercentField::new('promotionPercentage'),
            DateTimeField::new('startTime'),
            DateTimeField::new('endTime'),
        ];
    }
    
}
