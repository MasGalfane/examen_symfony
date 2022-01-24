<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use App\Repository\SubCategoryRepository;
use App\Repository\ThreadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private CategoryRepository $categoryRepository;
    private SubCategoryRepository $subCategoryRepository;
    private ThreadRepository $threadRepository;
    private PostRepository $postRepository;

    /**
     * @param CategoryRepository $categoryRepository
     * @param SubCategoryRepository $subCategoryRepository
     * @param ThreadRepository $threadRepository
     * @param PostRepository $postRepository
     */
    public function __construct(CategoryRepository $categoryRepository, SubCategoryRepository $subCategoryRepository, ThreadRepository $threadRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->subCategoryRepository = $subCategoryRepository;
        $this->threadRepository = $threadRepository;
        $this->postRepository = $postRepository;
    }


    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $categories = $this->categoryRepository->findAll();
        $subCategories = $this->subCategoryRepository->findAll();



        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }


}
