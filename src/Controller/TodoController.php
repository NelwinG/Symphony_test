<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\TodoList;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Form\Todo\NewTodo;



class TodoController extends AbstractController
{
   /**
    * @Route("/", name="Todo")
    */
    public function todo(): Response
    {
        return $this->render('todo/todo.html.twig');
    }



    public function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $todo = new TodoList();
        $todo->setName('new name :)');
        $todo->setDescription('new description');

        $form = $this->createForm(NewTodo::class, $todo);

        return new Response('Tadaaa');


    }

    /**
    * @Route("/new", name="new")
    */
    public function newTodo(Request $request, ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();

        $todo = new TodoList();


        $form = $this->createForm(NewTodo::class, $todo);

        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $todo = $form->getData();

            $entityManager->persist($todo);
            $entityManager->flush();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('show_all_todo');
        }

        return $this->renderForm('todo/new.html.twig', [
            'form' => $form,
        ]);
    }

    /**
     * @Route("/todoCreate", name="create_todo")
     */
    public function createTodo(ValidatorInterface $validator, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $todo = new TodoList();
        $todo->setName('Test de Todo');
        $todo->setDescription('Ceci est un test de description');

        $errors = $validator->validate($todo);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        // tell Doctrine you want to (eventually) save the task (no queries yet)
        $entityManager->persist($todo);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        

        return new Response('Oh un nouvel object todo avec l\'id : '.$todo->getId());
    }

    /**
     * @Route("/showall", name="show_all_todo")
     */
    public function showAll(ManagerRegistry $doctrine): Response
    {

        $todo = $doctrine->getRepository(TodoList::class)->findAll();

        return $this->render('todo/showall.html.twig', ['todo' => $todo]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }


    /**
     * @Route("/todo/{id}", name="todo_show")
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $todo = $doctrine->getRepository(TodoList::class)->find($id);

        if (!$todo) {
            throw $this->createNotFoundException(
                'No list found for id '.$id
            );
        }

        return new Response('La todo ' .$id. ' correspond à : '.$todo->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }



}