<?php
// api/src/Controller/BookSpecial.php

namespace App\Controller;

use App\Entity\Book;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BookSpecial
{
//    private $myService;

    public function __construct()
    {

    }

    /**
     * @Route(
     *     name="book_special",
     *     path="/books/{id}/special",
     *     methods={"PUT"},
     *     defaults={"_api_resource_class"=Book::class, "_api_item_operation_name"="special"}
     * )
     */
    public function __invoke(Book $data): object // API Platform retrieves the PHP entity using the data provider then (for POST and
        // PUT method) deserializes user data in it. Then passes it to the action. Here $data
        // is an instance of Book having the given ID. By convention, the action's parameter
        // must be called $data.
    {
        $data->setAuthor($data->getAuthor() . ' - altered');

        return $data; // API Platform will automatically validate, persist (if you use Doctrine) and serialize an entity
        // for you. If you prefer to do it yourself, return an instance of Symfony\Component\HttpFoundation\Response
    }
}