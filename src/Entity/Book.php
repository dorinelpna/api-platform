<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A book.
 *
 * @see http://schema.org/Book Documentation on Schema.org
 *
 * @ORM\Entity
 * @ApiResource(
 *     iri="http://schema.org/Book",
 *     itemOperations={
 *      "get",
 *      "delete",
 *      "special"={"route_name"="book_special"}
 *     }
 * )
 */
class Book
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string The ISBN of the book
     *
     * @Assert\Isbn
     * @Assert\Type(type="string")
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/isbn")
     */
    private $isbn;

    /**
     * @var string The title of the book
     *
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @ORM\Column
     * @ApiProperty(iri="http://schema.org/name")
     */
    private $title;

    /**
     * @var string A description of the item
     *
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @ORM\Column(type="text")
     * @ApiProperty(iri="http://schema.org/description")
     */
    private $description;

    /**
     * @var string The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably
     *
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @ORM\Column
     * @ApiProperty(iri="http://schema.org/author")
     */
    private $author;

    /**
     * @var \DateTime The date on which the CreativeWork was created or the item was added to a DataFeed
     *
     * @Assert\Date
     * @Assert\NotNull
     * @ORM\Column(type="date")
     * @ApiProperty(iri="http://schema.org/dateCreated")
     */
    private $publicationDate;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets isbn.
     *
     * @param string $isbn
     *
     * @return $this
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Gets isbn.
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Sets description.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Gets description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets author.
     *
     * @param string $author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Gets author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title the value to set
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get publicationDate.
     *
     * @return \DateTime
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Set publicationDate.
     *
     * @param \DateTime the value to set
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }
}
