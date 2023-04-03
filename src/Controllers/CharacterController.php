<?php
namespace StVivian\Controllers;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use StVivian\Models\CharacterModel;

class CharacterController
{
    private CharacterModel $model;
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);
        $this->model = new CharacterModel();
    }

    public function showCharacters(?string $filter = null, ?int $id = null): string
    {
        $characters = $this->model->getCharacters($filter, $id);
        return $this->twig->render('characters.html.twig', ['characters' => $characters]);
    }

    public function showForm(): string
    {
        return $this->twig->render('form.html.twig');
    }
}