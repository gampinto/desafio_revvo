<?php

declare(strict_types=1);

namespace App\Controller;

class CourseController extends AbstractController
{
  
    public function __construct()
    {
    }

    public function indexAction(): void
    {
        
        $this->render('home/index');
        
    }
}