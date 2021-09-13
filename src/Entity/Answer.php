<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 * @ORM\Table(name="answers")
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $answer_text;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * Email
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=180)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="10",
     *     max="180",
     * )
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     *
     */
    private $email;

    /**
     * Nick
     * @var string
     *
     * @ORM\Column(
     *     type="string",
     *     length=45
     *     )
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="10",
     *     max="45",
     * )
     */
    private $Nick;

    /**
     * @ORM\Column(type="integer")
     */
    private $isBest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswerText(): ?string
    {
        return $this->answer_text;
    }

    public function setAnswerText(string $answer_text): void
    {
        $this->answer_text = $answer_text;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): void
    {
        $this->question = $question;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getNick(): ?string
    {
        return $this->Nick;
    }

    public function setNick(string $Nick): void
    {
        $this->Nick = $Nick;
    }

    public function getIsBest(): ?int
    {
        return $this->isBest;
    }

    public function setIsBest(int $isBest): void
    {
        $this->isBest = $isBest;
    }
}